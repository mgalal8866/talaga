<div>
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card outline-success">
                <div class="card-header">
                    <h4 class="card-title">{{ __('tran.slider') }}</h4>
                    <a href='{{ route('updateslider') }}' class="btn  btn-success">New</a>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{ __('tran.name') }}</th>
                                <th>{{ __('tran.image') }}</th>
                                <th>{{ __('tran.city') }}</th>
                                <th>{{ __('tran.restore') }}</th>

                                <th>{{ __('tran.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($sliders  as $slider)
                                <tr>
                                    <td>
                                        <span class="fw-bold">{{ $slider->name }}</span>
                                    </td>
                                    <td> <img src=" {{ $slider->urlimg ?? 'N/A' }}" class="me-75" height="50"
                                            width="100" />
                                    </td>
                                    <td>
                                        @if ( $slider->city->name?? null)
                                        <span class="badge  rounded-pill  bg-success"> متجر : {{ $slider->city->name }}  </span>
                                        @else
                                        <span class="badge  rounded-pill    bg-danger"> جميع المحافظات </span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($slider->user->store_name?? null)
                                        <span class="badge  rounded-pill  bg-success"> متجر : {{ $slider->user->store_name }}  </span>
                                        @else
                                        <span class="badge  rounded-pill  bg-danger">غير موجة</span>
                                        @endif
                                    </td>

                                    <td><button class="btn btn-flat-warning waves-effect"
                                            wire:click="delete({{ $slider->id }})">{{ __('tran.delete') }}</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>


                                    <td colspan="7" class="alert alert-danger text-center"> No Data Here</td>

                                </tr>
                            @endforelse


                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>


</div>

@push('jslive')
    <script>
        window.addEventListener('swal', event => {

            Swal.fire({
                title: event.detail.message,
                icon: 'info',
                customClass: {
                    confirmButton: 'btn btn-danger'
                },
                buttonsStyling: false
            });
        })
    </script>
@endpush
