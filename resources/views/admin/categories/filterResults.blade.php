
@if ($subcategories->count() > 0)
     @foreach ($subcategories as $subcategory)
          <tr>
               <td style="vertical-align: middle !important;">{{ $subcategory->desc }}</td>
               <td>
                    <a href="{{ route('category.edit', ['id' => $subcategory->id]) }}">
                         <img style=" width:35px; " src="{{ asset('images\edit.svg') }}">
                    </a>
               </td>
               <td> 
                    <a href="{{ route('category.delete', ['id' => $subcategory->id]) }}">
                         <img style=" width:35px; " src="{{ asset('images\error.svg') }}">
                    </a>             
               </td>
          </tr>
     @endforeach
@else
     <tr>
          <td colspan="4" class="text-center">Sem Subtemas</td>
     </tr>
@endif