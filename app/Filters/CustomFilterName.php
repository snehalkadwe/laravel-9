<?php

// namespace App\Filters;

// use Spatie\QueryBuilder\Filters\Filter;
// use Illuminate\Database\Eloquent\Builder;

// class InvoiceSearchFilter implements Filter
// {
//     public function __invoke(Builder $query, $value, string $property)
//     {
//         $query->where(function ($query) use ($value) {
//             $query->where('number', 'LIKE', '%' . $value . '%')
//                 ->orWhereHas('client', function ($query) use ($value) {
//                     $query->where('name', 'LIKE', '%' . $value . '%');
//                 });
//         });
//     }
// }
