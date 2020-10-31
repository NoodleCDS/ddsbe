<?php
    //NEW
    namespace App\Models; //Helps in transfering our models into the folder.
    use Illuminate\Database\Eloquent\Model;
    class User extends Model{
    protected $table = 'tbluser';

    protected $fillable = [
    'username', 'password'
    ];
    //NEW
    public $timestamps = false; //So timestamps won't be logged or required
    protected $primaryKey = 'ID'; //No asking for ID
}