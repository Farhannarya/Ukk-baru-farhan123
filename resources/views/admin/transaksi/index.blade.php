<div class="row p-4">
  <div class="col-md-12">
    <div class="card">

      <div class="card-title p-1">

      </div>
      <div class="card-body">

        <h5><b>{{ $title }}</b></h5>

        <a href="/kasir/transaksi/create" class="btn btn-primary mb-4"><i class="fas fa-plus"></i> Tambah</a>

        <table class="table">
          <tr>
            <th>NO</th>
            <th>Tanggal</th>
            <th>Nama</th>
            <th>Total</th>
            <th>Status</th>
            <th>Action</th>
          </tr>

          @foreach($transaksi as $item)

          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->created_at }}</td>
            <td>{{ $item->kasir_name }}</td>
            <td>{{ $item->total }}</td>
            <td>{{ $item->status }}</td>
            <td>
              <div class="d-flex">
                <form id="formPrint{{$item->id}}"
                  action="{{ route('print.invoice', ['id' => $item->id]) }}"
                  method="POST">
                @csrf
                <button type="submit" class="btn btn-inverse-primary btn-icon" style="margin-left: 5px;">
                    <i class="fas fa-print"></i>
                </button>
            </form>
                <!-- <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a> -->
                <form action="/kasir/transaksi/{{ $item->id }}" method="POST">
                  @method('delete')
                  @csrf
                  <button type="submit" class="btn btn-danger btn-sm ml-1"><i class="fas fa-trash"></i></button>
                </form>
              </div>
            </td>
          </tr>
          @endforeach

        </table>

        {{ $transaksi->links() }}
      </div>
    </div>
  </div>
</div>
<script>
  document.querySelector('.btn-primary').addEventListener('click', function() {
    this.disabled = true;
  });
</script>