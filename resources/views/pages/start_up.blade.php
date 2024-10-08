@extends('layouts.app')
@section('content')
    <!-- content -->
    <div class="rts-academic-area rts-section-padding">
        <div class="container">
            <div class="row">
                <div class="rts-section">
                    <h3 class="rts-section-title">@lang('crud.start_up.title')</h3>
                </div>
            </div>
            <div class="all-program-category">
                <div class="row g-5">
                    {{ $start_ups }}
                    @foreach($start_ups as $start_up)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-cat-item">
                            <div class="cat-thumb">
                                <img src="{{ asset('storage/'.$start_up->image) }}" alt="course-thumbnail">
                                <a href="{{ route('start_up.show',$start_up->id) }}" class="cat-link-btn">startup</a>
                            </div>
                            <div class="cat-meta">
                                <div class="cat-title">
                                    <a href="{{ route('start_up.show',$start_up->id) }}">{!! $start_up['title_'.session('locale')] !!}</a>
                                </div>
                                <div class="cat-link">
                                    <a href="{{ route('start_up.show',$start_up->id) }}" class="cat-link-arrow"><i class="fa-sharp fa-regular fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="container">
                    <div class="mt--20 d-flex justify-content-center">
                        {{ $start_ups->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
