<table>
    <thead>
    <tr>
        <th>Location Name</th>
     
      
    </tr>
    </thead>
    <tbody>
    @foreach($locations as $location)
        <tr>
        
            <td>{{ $location->lname }}</td>
         
           
        </tr>
    @endforeach
    </tbody>
</table>