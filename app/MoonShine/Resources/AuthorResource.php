<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Author;
use App\MoonShine\Pages\Author\AuthorIndexPage;
use App\MoonShine\Pages\Author\AuthorFormPage;
use App\MoonShine\Pages\Author\AuthorDetailPage;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Laravel\Pages\Page;

/**
 * @extends ModelResource<Author, AuthorIndexPage, AuthorFormPage, AuthorDetailPage>
 */
class AuthorResource extends ModelResource
{
    protected string $model = Author::class;

    protected string $title = 'Authors';

    /**
     * @return list<Page>
     */
    protected function pages(): array
    {
        return [
            AuthorIndexPage::class,
            AuthorFormPage::class,
            AuthorDetailPage::class,
        ];
    }

    /**
     * @param Author $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
