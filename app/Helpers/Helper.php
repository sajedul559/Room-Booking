<?php

use Carbon\Carbon;
use App\Models\User;
use App\Models\Vendor;
use App\Models\Property;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use League\CommonMark\Normalizer\SlugNormalizer;



const date_format_list = [
    'jS M, Y'                   => '22th May, 2024',
    'Y-m-d'                     => '2024-05-22',
    'Y-d-m'                     => '2024-22-05',
    'd-m-Y'                     => '22-05-2024',
    'm-d-Y'                     => '05-22-2024',
    'Y/m/d'                     => '2024/05/22',
    'Y/d/m'                     => '2024/22/05',
    'd/m/Y'                     => '22/05/2024',
    'm/d/Y'                     => '05/22/2024',
    'l jS \of F Y'              => 'Monday 22th of May 2024',
    'jS \of F Y'                => '22th of May 2024',
    'g:ia \o\n l jS F Y'        => '12:00am on Monday 22th May 2024',
    'F j, Y, g:i a'             => 'May 22 2024, 3:00 pm',
    'F j, Y'                    => 'May 22, 2024',
    '\i\t \i\s \t\h\e jS \d\a\y'=> 'it is the 22th day'
];
if (!function_exists('user')) {
    function user()
    {
      return auth()->user() ?? null;
    }
}
if (!function_exists('userId')) {
    function userId()
    {
      return  auth()->user() ? user()->id : null ;
    }
}
if (!function_exists('dateFormat')) {
    function dateFormat($date_time, $default =  'jS M, Y')
    {
        if (!$date_time) return null;
        $format = getSetting('date_time_format') ?? $default;
        return Carbon::parse($date_time)->format($format);
    }
}

if (!function_exists('getSetting')) {
    function getSetting($key, $default = null)
    {
        $settings = Cache::rememberForever('system_settings', function () {
            return DB::table('system_settings')->get();
        });
        $setting = $settings->where('key', $key)->value('value');
        return $setting ? $setting : $default;
    }
}
if (!function_exists('getArrayValue')) {
    function getArrayValue($array, $key, $default = null)
    {

        return array_key_exists($key, $array) ? $array[$key] : $default;
    }
}
if (!function_exists('number_format')) {
    /**
     * Format a number with custom precision, thousands separator, and decimal separator.
     *
     * @param float|int $number
     * @param int $decimals
     * @param string $decimal_separator
     * @param string $thousands_separator
     * @return string
     */
    function number_format($number, $decimals = 2, $decimal_separator = '.', $thousands_separator = ',')
    {
        return number_format($number, $decimals, $decimal_separator, $thousands_separator);
    }
}
if (!function_exists('encrypt')) {
    function encrypt($name)
    {
        return Crypt::encrypt($name);
    }
}
if (!function_exists('decrypt')) {
    function decrypt($encrypted)
    {
        return Crypt::encrypt($encrypted);
    }
}
if (!function_exists('toaster')) {
    function toaster($msg = 'Operation Successfully', $type = 'success', $position = 'right')
    {
        $toaster = match ($type) {
            'success' => Toastr()->success($msg, $type, ["positionClass" => "toast-top-$position"]),
            'error'   => Toastr()->error($msg, $type, ["positionClass" => "toast-top-$position"]),
            'warning' => Toastr()->warning($msg, $type, ["positionClass" => "toast-top-$position"]),
            'info'    => Toastr()->info($msg, $type, ["positionClass" => "toast-top-$position"]),
            default   => Toastr()->success($msg, $type, ["positionClass" => "toast-top-$position"]),
        };

        return $toaster;
    }
}
// file upload
if (!function_exists('fileUpload')) {
    function fileUpload($path, $file, $change_name = false)
    {

        $fileName = '';
        if (!$file) {
            return null;
        }

        $original_name = $file->getClientOriginalName();
        if ($change_name) {
            $name = $original_name;
        } else {
            $str = str_replace(' ', '-', $original_name);
            $name = time() . '_' . $str;
        }

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $file->move($path, $name);
        $fileName = $path . $name;

        return $fileName;
    }
}
// file update
if (!function_exists('fileUpdate')) {
    function fileUpdate($databaseFile, $path, $file)
    {

        $fileName = "";


        if ($file) {
            $fileName = fileUpload($path, $file);

            if ($databaseFile && file_exists($databaseFile)) {

                unlink($databaseFile);
            }
        } elseif (!$file and $databaseFile) {
            $fileName = $databaseFile;
        }


        return $fileName;
    }
}

# text to a slug.
if (!function_exists('convertToSlug')) {
    function convertToSlug($text)
    {
        $text = mb_strtolower(trim(preg_replace('~[^\pL\d]+~u', ' ', $text)));

        // Remove diacritics from the text
        $textV = removeDiacritics($text);

        // Replace spaces and special characters with dashes
        $slug = preg_replace('/[^a-z0-9-]+/', '-', strtolower($textV));

        // Remove leading and trailing dashes
        $slug = trim($slug, '-');
        if ($slug == '') {
            $normalize = new SlugNormalizer;
            $slug = $normalize->normalize($text);
        }
        return $slug;
    }
}
# This function removes diacritics from Vietnamese text.
if (!function_exists('removeDiacritics')) {
    function removeDiacritics($text)
    {
        $diacritics = array(
            'à' => 'a',
            'á' => 'a',
            'ạ' => 'a',
            'ả' => 'a',
            'ã' => 'a',
            'â' => 'a',
            'ầ' => 'a',
            'ấ' => 'a',
            'ậ' => 'a',
            'ẩ' => 'a',
            'ẫ' => 'a',
            'ă' => 'a',
            'ằ' => 'a',
            'ắ' => 'a',
            'ặ' => 'a',
            'ẳ' => 'a',
            'ẵ' => 'a',
            'è' => 'e',
            'é' => 'e',
            'ẹ' => 'e',
            'ẻ' => 'e',
            'ẽ' => 'e',
            'ê' => 'e',
            'ề' => 'e',
            'ế' => 'e',
            'ệ' => 'e',
            'ể' => 'e',
            'ễ' => 'e',
            'ì' => 'i',
            'í' => 'i',
            'ị' => 'i',
            'ỉ' => 'i',
            'ĩ' => 'i',
            'ò' => 'o',
            'ó' => 'o',
            'ọ' => 'o',
            'ỏ' => 'o',
            'õ' => 'o',
            'ô' => 'o',
            'ồ' => 'o',
            'ố' => 'o',
            'ộ' => 'o',
            'ổ' => 'o',
            'ỗ' => 'o',
            'ơ' => 'o',
            'ờ' => 'o',
            'ớ' => 'o',
            'ợ' => 'o',
            'ở' => 'o',
            'ỡ' => 'o',
            'ù' => 'u',
            'ú' => 'u',
            'ụ' => 'u',
            'ủ' => 'u',
            'ũ' => 'u',
            'ư' => 'u',
            'ừ' => 'u',
            'ứ' => 'u',
            'ự' => 'u',
            'ử' => 'u',
            'ữ' => 'u',
            'ỳ' => 'y',
            'ý' => 'y',
            'ỵ' => 'y',
            'ỷ' => 'y',
            'ỹ' => 'y',
            'đ' => 'd',
        );
        return strtr($text, $diacritics);
    }
}
if (!function_exists('getStartEndDate')) {
    function getStartEndDate($date_range)
    {
        // Check if `daterange` exists and is not empty
        if ($date_range) {
            // Split the date_range into start and end dates
            [$start, $end] = explode(' to ', $date_range);

            // Parse the start and end dates to a format compatible with Laravel (e.g., 'Y-m-d')
            $data['startDate'] = \Carbon\Carbon::createFromFormat('d M, Y', trim($start))->format('Y-m-d');
            $data['endDate'] = \Carbon\Carbon::createFromFormat('d M, Y', trim($end))->format('Y-m-d');
        } else {
            // Set defaults if `date_range` is not provided
            $data['startDate'] = null;
            $data['endDate'] = null;
        }
       return $data;
    }
}
if (!function_exists('getTimeBasedGreeting')) {
    function getTimeBasedGreeting() {
        $hour = date("H");

        if ($hour >= 5 && $hour < 12) {
            return "Good Morning";
        } elseif ($hour >= 12 && $hour < 17) {
            return "Good Afternoon";
        } elseif ($hour >= 17 && $hour < 21) {
            return "Good Evening";
        } else {
            return "Good Night";
        }
    }
}

if (!function_exists('generateBreadcrumbs')) {
    function generateBreadcrumbs()
    {
        $segments = request()->segments();
        $breadcrumbs = [];
        $url = '';

        foreach ($segments as $segment) {
            $url .= '/' . $segment;
            $breadcrumbs[] = [
                'name' => ucfirst($segment),
                'url' => url($url),
            ];
        }
        return $breadcrumbs;
    }
}
if(!function_exists('discountAmount')) {
    function discountAmount($percentage, $amount) {
         $value = ($percentage * $amount) /100;
        return number_format($value, 2);
    }
}
if(!function_exists('numberFormat')) {
    function numberFormat($amount) {
        return number_format($amount, 2);
    }
}
if(!function_exists('getStatusText')) {
    function getStatusText(int $key): string
    {
        // Define the mapping array for statuses and colors
        $statuses = [
            PATIENT => ['text' => 'Patient', 'color' => 'blue'],
            FULL_PAID => ['text' => 'Full Paid', 'color' => 'green'],
            PARTIAL_PAID => ['text' => 'Partial Paid', 'color' => 'orange'],
            FULL_DUE => ['text' => 'Full Due', 'color' => 'red'],
            OVER_PAID => ['text' => 'Over Paid', 'color' => 'purple'],
        ];

        // Get the status text and color
        $status = $statuses[$key] ?? ['text' => 'Unknown Status', 'color' => 'gray'];

        // Return the span tag with the appropriate color
        return "<span style=\"color: {$status['color']};\">{$status['text']}</span>";
    }
}

if(!function_exists('calculateDays')) {
    function calculateDays($startDate, $endDate, $inclusive = false)
    {
        $start = Carbon::parse($startDate);
        $end = Carbon::parse($endDate);

        $days = $start->diffInDays($end);
        if($startDate == $endDate) {
           return 1;
        }
        if ($inclusive) {
            $days += 1;
        }

        return $days;
    }
}

# Text Replace
if (!function_exists("textReplace")) {
    function textReplace($value, $searchKey = ".", $replaceWith = " ")
    {

        return str_replace($searchKey, $replaceWith, $value);
    }
}
# Text Replace
if (!function_exists("monthList")) {
    function monthList()
    {

        $months = [
            1 => 'January',
            2 => 'February',
            3 => 'March',
            4 => 'April',
            5 => 'May',
            6 => 'June',
            7 => 'July',
            8 => 'August',
            9 => 'September',
            10 => 'October',
            11 => 'November',
            12 => 'December',
        ];
        
        return $months;
    }
}
        

if (!function_exists('dateFormatter')) {
    function dateFormatter($data, $format = 'Y-m-d')
    {
        if($data){
            $data = Carbon::parse($data);
            return $data->format($format);
        }else{
            return NULL;
        }
    }
}

if (!function_exists('getApprovedVendors')) {
    /**
     * Fetch approved vendors.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    function getApprovedVendors()
    {
        return Vendor::where("status", Vendor::VENDOR_STATUS_APPROVE)->get();
    }
}
if (!function_exists('getPublishedProperties')) {
    /**
     * Fetch published properties.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    function getPublishedProperties()
    {
        return Property::where("is_publish", 1)->get();
    }
}
if (!function_exists('getUsers')) {
    /**
     * Fetch approved tenants.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    function getUsers()
    {
        return User::where("type", User::USER_TYPE_USER)->get(); // Adjust the model if tenants are a separate entity.
    }
}
if (!function_exists('getRooms')) {
    /**
     * Fetch approved tenants.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    function getRooms()
    {
        return User::where("type", User::USER_TYPE_USER)->get(); // Adjust the model if tenants are a separate entity.
    }
}