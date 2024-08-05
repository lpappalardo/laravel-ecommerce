<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * 
 *
 * @property int $id
 * @property string $title
 * @property string $subtitle
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|News newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|News newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|News query()
 * @method static \Illuminate\Database\Eloquent\Builder|News whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereSubtitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Publication extends Model
{
    use HasFactory;

    protected $table = 'publications';

    protected $primaryKey = 'id';

    protected $fillable = ['title', 'subtitle', 'content', 'author', 'publication_date', 'cover', 'cover_description'];

    public const VALIDATION_RULES = [
        'title' => 'required|min:10',
        'subtitle' => 'required|min:10',
        'author' => 'required|min:4',
        'publication_date' => 'required',
    ];

    public const VALIDATION_MESSAGES = [
        'title.required' => 'El título debe tener un valor.',
        'title.min' => 'El título debe tener al menos :min caracteres.',
        'subtitle.required' => 'El subtítulo debe tener un valor.',
        'subtitle.numeric' => 'El subtítulo debe tener al menos :min caracteres.',
        'author.required' => 'El autor debe tener un valor.',
        'author.min' => 'El autor debe tener al menos :min caracteres.',
        'publication_date.required' => 'Las fecha de publicación debe tener un valor.',
    ];

    protected function casts(): array
    {
        return [
            'publication_date' => 'datetime:d/m/Y',
        ];
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(
            Category::class,
            'publications_have_categories',
            'publication_fk',
            'category_fk',
            'id',
            'category_id'
        );
    }
}
