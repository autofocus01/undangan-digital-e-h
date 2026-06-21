#!/bin/sh
set -e

echo "==> Setting up Laravel..."

cd /var/www/html

# Substitute PORT into nginx config (Railway provides $PORT dynamically)
export PORT="${PORT:-8080}"
envsubst '${PORT}' < /etc/nginx/http.d/default.conf.template > /etc/nginx/http.d/default.conf

# Generate app key if not set
if [ -z "$APP_KEY" ]; then
    echo "==> Generating APP_KEY..."
    php artisan key:generate --force
fi

# Run migrations
echo "==> Running migrations..."
php artisan migrate --force

# Cache config, routes, views
echo "==> Caching..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Fix permissions after cache
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

echo "==> Starting services..."
exec supervisord -c /etc/supervisord.conf