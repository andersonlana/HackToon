<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profissional extends Model
{
    use HasFactory;
    protected $fillable = ['Nome','IdProfissional']; // Campos permitidos para preenchimento
    protected $table = "profissionais";
}
