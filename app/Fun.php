<?

namespace App;
use Image;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Str;

class Fun extends Model {

	public static function getUrlImageMenuHome($id) {

		switch ($id) {
			
			case '1':
				return asset('images/entradas/'. random_int(1, 3) );
				break;
			
			case '2':
			return asset('images/principal/'. random_int(1, 4) );
				break;
			
			case '3':
			return asset('images/postres/'. random_int(1, 3) );
				break;
			
		}

	}

	public static function getUrlMenu($lang) {

        $menu = Menu::where([ 'id' => 1 ])->first();

            switch ( $lang ) {
            
                case 'es':
                    $link = asset('pics/menus/large/'.$menu->es);
                    break;

                case 'en':
                    $link = asset('pics/menus/large/'.$menu->en);
                    break;

                case 'pr':
                    $link = asset('pics/menus/large/'.$menu->pr);
                    break;
            }  

            return $link;

    }

	public static function getFlagLanguage() {
		
		switch ( app()->getLocale() ) {
			case 'es':
				echo '<img src="'.asset('images/argentina-flag.png').'" style="height:20px;margin-bottom: 4px;" >';
				break;
			case 'en':
				echo '<img src="'.asset('images/united-kingdom-flag.png').'" style="height:20px;margin-bottom: 4px;" >';
				break;
			case 'pr':
				echo '<img src="'.asset('images/brasil-flag.png').'" style="height:20px;margin-bottom: 4px;" >';
				break;
		}
	
	}

	public static function getIconStatus($status) {

		if ($status==1) {return '<i style="font-size:18px;" class="fa fa-check"></i>';} 
			else {return '<i style="font-size:18px;" class="fa fa-times"></i>';}
		}

	public static function getFormatDate($date) {

		$date = explode("-",$date);
        $date = "$date[2]-$date[1]-$date[0]";  
		
		return $date;
	}

	public static function getPathImage($size, $model, $filename) {

		$pics_path = config('constants.options.pics-path');

		$image_path = $pics_path.$model.'/'.$size.'/'.$filename;

		return $image_path;

	}

}
