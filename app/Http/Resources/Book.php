<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Book extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //Este es un recurso que nos permitirá la comunicacion entre el modelo y el retorno de un JSON
        //return parent::toArray($request);
        //se especifica que datos se desean mostrar
        return[
            'id'=>$this->id,
            'title'=>$this->title,
            'genre'=>$this->genre,
            'author'=>$this->author,
            'publisher'=>$this->publisher,
            'year'=>$this->year,
            'cover'=>$this->cover
        ];
    }
    public function with($request){
        return[
            'version_API' => "1.0.0",
            'authors' => "Chevez, Flores"
        ];
    }
}
