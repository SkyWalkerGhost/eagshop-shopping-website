<?php 

    function filterSortProduct()
    {
        return [
            'sort'          => 'დალაგება',
            'price_asc'     => 'ფასი: ზრდადობით',
            'price_desc'    => 'ფასი: კლებადობით',
            'name_asc'      => 'სახელი: A - Z',
            'name_desc'     => 'სახელი: Z - A',
            'action_price'  => 'აქციის ფასი: კლებადობით',
        ];
    }


    function showProductPerPage()
    {
        return [20, 50, 100,];
    }