<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * 
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Book newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Book newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Book query()
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Book extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $primaryKey = 'id';

    protected $fillable = ['title', 'price', 'description', 'author', 'pages', 'format_fk', 'cover', 'cover_description'];

    public const VALIDATION_RULES = [
        'title' => 'required|min:2',
        'price' => 'required|numeric',
        'author' => 'required|min:4',
        'pages' => 'required|numeric',
        'format_fk' => 'required|exists:formats,format_id',
        'description' => 'required',
    ];

    public const VALIDATION_MESSAGES = [
        'title.required' => 'El título debe tener un valor.',
        'title.min' => 'El título debe tener al menos :min caracteres.',
        'price.required' => 'El precio debe tener un valor.',
        'price.numeric' => 'El precio debe ser un número.',
        'author.required' => 'El autor debe tener un valor.',
        'author.min' => 'El autor debe tener al menos :min caracteres.',
        'pages.required' => 'Las páginas deben tener un valor.',
        'pages.numeric' => 'Las páginas deben ser un número.',
        'format_fk.required' => 'Es necesario elegir un formato.',
        'description.required' => 'La descripción debe tener un valor.',
    ];

    protected function price(): Attribute
    {

        return Attribute::make(
            get: fn ($value) => $value / 100,
            set: fn ($value) => $value * 100
        );
    }

    public function format():BelongsTo
    {
        return $this->belongsTo(Format::class, 'format_fk', 'format_id');
    }

    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(
            Genre::class,
            'books_have_genres',
            'book_fk',
            'genre_fk',
            'id',
            'genre_id'
        );
    }
}
