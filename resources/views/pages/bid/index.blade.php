@extends('layouts.app')
@section('content')
<div class="container-fluid">
    @if (session('success'))
        <div class="alert alert-success">
            <strong>Berhasil !</strong>
            <p>{{ session('success') }}</p>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h6>Data BID</h6>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered dTable" id="table" style="width: 100%">
                        <thead>
                            <tr>
                                <th width=20>No.</th>
                                <th>Message ID Admin</th>
                                <th>Message ID Auction</th>
                                <th>User</th>
                                <th>Admin</th>
                                <th>OB</th>
                                <th>KB</th>
                                <th>Caption</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Extra Time</th>
                                <th>Final BID</th>
                                <th>Path</th>
                                <th>Status</th>
                                <th>Upload Time</th>
                                <th width=160>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $item->message_id_admin }}</td>
                                <td>{{ $item->message_id_auction }}</td>
                                <td>{{ $item->user->name ?? ' - ' }}</td>
                                <td>{{ $item->admin->name ?? ' - ' }}</td>
                                <td>{{ $item->ob}}</td>
                                <td>{{ $item->kb}}</td>
                                <td>{{ $item->caption}}</td>
                                <td>{{ $item->start_time }}</td>
                                <td>{{ $item->end_time }}</td>
                                <td>{{ $item->extra_time }}</td>
                                <td>{{ $item->final_bid }}</td>
                                <td>{{ $item->path }}</td>
                                <td>{{ $item->status }}</td>
                                <td>{{ $item->upload_time }}</td>
                                <td>
                                    <button class="btn btn-sm btn-warning btnBidder" type="button" data-toggle="modal" data-id="{{ $item->bid_id }}" data-url="{{ route('bid.bidder',$item->bid_id) }}">Bidder</button>
                                    <a href="{{ route('bid.edit', $item->bid_id) }}" class="btn btn-sm btn-info">Edit</a>
                                    <form action="{{ route('bid.destroy', $item->bid_id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalBidder" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Data Bidder</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
@endsection
@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css">
@endpush
@push('scripts')
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('.dTable').DataTable({
            responsive: true
        });

        $('body').on('click','.btnBidder',function(){
            var bid_id = $(this).data('id');
            var url = $(this).data('url');
            console.log(bid_id + ' - ' + url);
            $('#modalBidder .modal-body').load(url);
            $('#modalBidder').modal('show');
        })
    } );
</script>
@endpush