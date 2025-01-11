# Является ли день праздником

Установка пакета

```bash
  composer require veneridze/laravel-holidays
```

Опубликовать конфигурационный файла

```bash
  php artisan vendor:publish
```

Опубликовать миграцию

```bash
  php artisan vendor:publish
```

Провести миграцию

```bash
  php artisan migrate
```

Обновить список праздников

```bash
  php artisan holiday:update 2024
```

Проверить является ли дата праздником

```php
  $date = Carbon::now();
  Holiday::isHoliday($date);
```

Использование правил валиации

```php
use Veneridze\LaravelHoliday\Validation\DayIsHoliday;
use Veneridze\LaravelHoliday\Validation\DayNotHoliday;
public static function rules(ValidationContext $validationContext): array {
    return [
        'date' => [new DayIsHoliday],
        'date' => [new DayNotHoliday]
    ];
}
```
