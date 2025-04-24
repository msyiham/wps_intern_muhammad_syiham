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
							<!-- BEGIN #datatable -->
							<div id="datatable" class="mb-5">
								<h3>Daftar catatan harian anda</h3>
								<p>Disinilah anda melihat apakah catatan harian anda di setujui oleh atasan anda.</p>
								<div class="card">
									<div class="card-body">
										<table id="datatableDefault" class="table text-nowrap w-100">
											<thead>
												<tr>
													<th>Tanggal</th>
													<th>Catatan</th>
													<th>Foto</th>
													<th>Status</th>
													<th>Edit</th>
												</tr>
											</thead>
											<tbody>
												@foreach($notes as $note)
												<tr>
													<td>{{ \Carbon\Carbon::parse($note->date)->format('d M Y') }}</td>
													<td>
														<button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#modalNote{{ $note->id }}">
															Lihat Catatan
														</button>
												
														<!-- Modal UNIK untuk setiap baris -->
														<div class="modal fade" id="modalNote{{ $note->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $note->id }}" aria-hidden="true">
															<div class="modal-dialog modal-lg">
																<div class="modal-content">
																	<div class="modal-header">
																		<h5 class="modal-title" id="modalLabel{{ $note->id }}">Catatan dari Anda</h5>
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
														<span class="badge bg-{{ $note->status === 'approved' ? 'success' : ($note->status === 'pending' ? 'warning' : 'danger') }}">
															{{ ucfirst($note->status) }}
														</span>
													</td>
													<td class="d-flex gap-1">
														<a href="{{ route('user.daily-note.edit', $note->id) }}" class="btn btn-sm btn-warning">Edit</a>
														
														<form action="{{ route('user.daily-note.destroy', $note->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus catatan ini?')">
															@csrf
															@method('DELETE')
															<button type="submit" class="btn btn-sm btn-danger">Hapus</button>
														</form>
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
