<?php

namespace GuiaLocaliza\Companies\Admin\Applications\Http\Services\Suggest;

class GenericSuggestService
{
    public function make($results)
    {

        $suggestions = [];
        if ($results === false) {
            return json_encode(['suggestions' => [] ]);
        }

        foreach($results as $result)
        {
            $suggestions[] = [
                'data' => $result->id,
                'value' => $result->name
            ];
        }

        return json_encode(['suggestions' => $suggestions ]);

//        $suggestions = array();
//        if ($results === false) {
//            return false;
//        }
//
//        $results_array = [];
//        foreach($results as $result)
//        {
//            array_push( $results_array, $result->name);
//        }
//
//        foreach($results_array as $result)
//        {
//            $suggestions[] = array(
//                'value' => $result,
//                'name' => $result
//            );
//        }
//        return (json_encode(array('suggestions' => $suggestions)));

    }

}

