<!-- bikin model categori pada module shop -->

php artisan module:make-model Category shop

<!-- bikin factory categori pada module shop -->

php artisan module:make-factory Category shop

cara bikin nya
Modules\Shop\App\Models\Category::factory()->count(5)->create();

agar tidak menggunakan npm run dev
kita bisa menggunakan  npm run build (masuk ke vite.config lalu tambahkan recoursernya)
# MarketPlace-Laravel
# MarketPlace-Laravel
