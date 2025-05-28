<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Content;
use App\MoonShine\Pages\Content\ContentIndexPage;
use App\MoonShine\Pages\Content\ContentFormPage;
use App\MoonShine\Pages\Content\ContentDetailPage;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Laravel\Pages\Page;

/**
 * @extends ModelResource<Content, ContentIndexPage, ContentFormPage, ContentDetailPage>
 */
class ContentResource extends ModelResource
{
    protected string $model = Content::class;

    protected string $title = 'Contents';
    
    /**
     * @return list<Page>
     */
    protected function pages(): array
    {
        return [
            ContentIndexPage::class,
            ContentFormPage::class,
            ContentDetailPage::class,
        ];
    }

    /**
     * @param Content $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
