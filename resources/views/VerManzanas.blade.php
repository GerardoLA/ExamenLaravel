<h1>aqui la tabla de manzanas</h1>
<x-app-layout>
    <table class="table">
     <thead>
         <tr>
             <th scope="col">#</th>
             <th scope="col">ID</th>
             <th scope="col">tipoManzana</th>
             <th scope="col">precioKilo </th>
         </tr>
     </thead>
     <tbody>
         @foreach ($manzanas as $manzana)
         <tr>
 
             <td>{{ $manzana->id }}</td>
             <td>{{ $manzana->tipoManzana }}</td>
             <td>{{ $manzana->precioKilo }}</td>
             <td>
                 <form action="{{ route('manzanas.eliminar', ['manzanas'=> $manzanas]) }}" method="post" style="display: inline;">
                     @csrf
                     @method('DELETE')
                     <button type="submit">DELETE</button>
                 </form>
             </td>
             <td>
                 <a href="{{route('manzanas.update', ['manzana'=> $manzana])}}">Actualizar</a>
             </td>
         </tr>
         @endforeach
     </tbody>
    </table>    
 </x-app-layout