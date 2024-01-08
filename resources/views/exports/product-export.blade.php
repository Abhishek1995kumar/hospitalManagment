<table>
    <thead>
    <tr>
        <th>Reference Code</th>
        <th>Product Name</th>
        <th>Product MRP</th>
        <th>Max Quantity</th>
        <th>Min Quantity</th>
        <th>Product Discount</th>
        <th>Supplier Name</th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
        
            <td>{{ $product->ref_code }}</td>
            <td>{{ $product->product_name }}</td>
            <td>{{ $product->mrp }}</td>
            <td>{{ $product->max_qty }}</td>
            <td>{{ $product->min_qty }}</td>
            <td>{{ $product->discount }}</td>
            <td>{{ $product->supplier_name }}</td>
           
        </tr>
    @endforeach
    </tbody>
</table>