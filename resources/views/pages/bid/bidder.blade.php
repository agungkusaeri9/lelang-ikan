<table class="table table-striped dTable">
    <tr>
        <th>BID TIme</th>
        <th>Auction ID</th>
        <th>User ID</th>
        <th>BID ID</th>
        <th>Price Offered</th>
        <th>Status</th>
    </tr>
    @foreach ($bidders as $bidder)
    <tr>
        <td>{{ $bidder->bid_time }}</td>
        <td>{{ $bidder->auction_id }}</td>
        <td>{{ $bidder->user_id }}</td>
        <td>{{ $bidder->bid_id }}</td>
        <td>{{ $bidder->price_offered }}</td>
        <td>{{ $bidder->status }}</td>
    </tr>
    @endforeach
</table>
