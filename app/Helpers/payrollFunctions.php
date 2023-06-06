<?php

namespace App\Helpers;
use Illuminate\Support\Str;
use DB;
class payrollFunctions
{
	public static function get_auto_numbers()
	{
		$autos = DB::table("nos")->first();
		return $autos;
	}
    
    public static function getNextNumber($ntype)
    {
        // DB::beginTransaction();
        
        try {
            $NextNo = '';
            switch ($ntype) {
                case 'STAFF':
                    $_no = DB::table("nos")->sharedLock()->first();
                    DB::table("nos")->sharedLock()->increment('staffno',1);
                    $NextNo =$_no->prest.Str::padLeft($_no->staffno,$_no->lpad, '0');
                    break;
                default:
                    $_no = DB::table("nos")->sharedLock()->first();
                    DB::table("nos")->sharedLock()->increment('staffno',1);
                    $NextNo =$_no->prest.Str::padLeft($_no->staffno,$_no->lpad, '0');
        }
            return $NextNo;
    
        // DB::commit();
        } catch (\Exception $e) {
            // DB::rollback();
            return $e->getMessage();
        }
    }
}