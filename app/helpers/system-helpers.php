 <?php

 if(!function_exists('by_own_type')){
    function by_own_type($query, $type, $paginate = 6)
    {
        $ownType = config('systemSettings.OWN_TYPES');
        switch($type){
            case $ownType['SINGLE'];
                return $query->first();
                break;
            case $ownType['MULTIPLE'];
                return $query->get();
                break;
            case $ownType['MULTIPLE_DESC'];
                return $query->orderby("{$paginate}", 'desc')->get();
                break;
            case $ownType['PAGINATE'];
                return $query->paginate($paginate);
                break;
            case $ownType['EXISTS'];
                return $query->exists();
                break;
            case $ownType['LIMIT'];
                return $query->limit($paginate)->get();
                break;
            case $ownType['COUNT'];
                return $query->count();
                break;
        }
    }
 }

 if(!function_exists('lock')){
    function lock($text)
    {
        return md5($text);
    }
 }
