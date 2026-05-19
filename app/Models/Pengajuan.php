<?php

namespace App\Models;

// use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
// use Laravel\Scout\Attributes\SearchUsingFullText;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Pengajuan extends Model
{
    use HasFactory;
    protected $guarded =['id'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->orWhere('nm_pasien', 'like', '%' . $search . '%')
                        ->orWhere('nm_asuransi', 'like', '%' . $search . '%')
                        ->orWhere('no_rm', 'like', '%' . $search . '%');
        });
    }

    public function scopeTgl($query, array $filters)
    {
        $query->when($filters['tgl_awal'] ?? false, function($query, $tgl_awal){
            return $query->WhereDate('created_at', '>=',  $tgl_awal);
        });

        $query->when($filters['tgl_akhir'] ?? false, function($query, $tgl_akhir){
            return $query->WhereDate('created_at', '<=',  $tgl_akhir);
        });
    }









    public function user(){
        return $this->belongsTo(User::class);
    }

    public function dokter(){
        return $this->belongsTo(Dokter::class);
    }

   


}