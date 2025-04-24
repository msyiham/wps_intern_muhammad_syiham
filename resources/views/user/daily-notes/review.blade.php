@extends('layouts.main.app')
@section('title', 'User | Daftar Catatan Harian')
@section('content')
		<!-- BEGIN #content -->
		<div id="content" class="app-content">
			<!-- BEGIN container -->
			<div class="container">
				<!-- BEGIN row -->
				<div class="row justify-content-center">
					<!-- BEGIN col-10 -->
					<div class="col-xl-10">
						<!-- BEGIN row -->
						<div class="row">
							<!-- BEGIN col-9 -->								
								<h1 class="page-header">
								    Cek Aktivitas <br><small>Berikut adalah catatan yang dimasukkan oleh bawahan anda, jangan Lupa untuk mereviewnya.</small>
								</h1>
								
								<hr class="mb-4">
								
								<!-- BEGIN #datatable -->
								<div id="datatable" class="mb-5">
									<div class="card">
										<div class="card-body">
											<table id="datatableDefault" class="table text-nowrap w-100">
												<thead>
													<tr>
                                                        <th>Nama</th>
                                                        <th>Tanggal</th>
                                                        <th>Catatan</th>
                                                        <th>Foto</th>
                                                        <th>Status</th>
													</tr>
												</thead>
                                                <tbody>
                                                    @foreach($notes as $note)
                                                    <tr>
                                                        <td>{{ $note->user->name }}</td>
                                                        <td>{{ $note->date }}</td>
                                                        <td>
                                                            <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#modalNote{{ $note->id }}">
                                                                Lihat Catatan
                                                            </button>
                                                    
                                                            <div class="modal fade" id="modalNote{{ $note->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $note->id }}" aria-hidden="true">
                                                                <div class="modal-dialog modal-lg">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="modalLabel{{ $note->id }}">Catatan dari {{ $note->user->name }}</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            {!! ($note->note) !!}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            @if($note->photo)
                                                                <img src="{{ asset('storage/' . $note->photo) }}" alt="Foto" width="100">
                                                            @else
                                                                -
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if($note->status === 'pending')
                                                                <form action="{{ route('user.daily-note.update-status', $note->id) }}" method="POST" style="display:inline;">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <input type="hidden" name="status" value="approved">
                                                                    <button type="submit" class="btn btn-success btn-sm">Approve</button>
                                                                </form>
                                                                <form action="{{ route('user.daily-note.update-status', $note->id) }}" method="POST" style="display:inline;">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <input type="hidden" name="status" value="rejected">
                                                                    <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                                                                </form>
                                                            @else
                                                                <span class="badge bg-{{ $note->status == 'approved' ? 'success' : 'danger' }}">{{ ucfirst($note->status) }}</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    </tbody>
                                                    
											</table>
										</div>
										<div class="hljs-container rounded-bottom">
											<pre><code class="xml" data-url="assets/data/table-plugins/code-1.json"></code></pre>
										</div>
									</div>
								</div>
								<!-- END #datatable -->
							<!-- END col-9-->
						</div>
						<!-- END row -->
					</div>
					<!-- END col-10 -->
				</div>
				<!-- END row -->
			</div>
			<!-- END container -->
		</div>
		<!-- END #content -->
@endsection
