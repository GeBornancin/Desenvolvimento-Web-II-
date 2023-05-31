use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Eixo extends Model
{
    use HasFactory;
    use SoftDeletes;
    

    protected $fillable = ['nome','email','siape','eixo_id','status'];

    public function eixo() {

        return $this->belongsTo('\App\Models\Eixo');

    }
  
}