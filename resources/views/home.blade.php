@extends('layouts.app')

@section('content')
<div class="col-md-4" style="margin-bottom: 10px;">
           <div class="card">
                    <div class="card-header">
                       <b class="card-title text-center text-success">Current Job</b>
                       <div class="card-tools"></div>
                    </div>
                    <div class="card-body p-0">
                      <div class="card-body">
                           @foreach ($job as $jobs)
                           <a href="{{ route('jobDetail',["jobid"=>$jobs->id]) }}">{{ $jobs->job_title }}</a><span class="text-danger"> (Last Date: {{$jobs->closing_date}})</span><br>
                           @endforeach
                      </div>
                      <div class="card-footer">
                          <a href="{{route('job')}}" target="_blank" class="right btn btn-sm btn-info">View All</a>
                      </div>
                    </div>
            </div>
        </div>
        <div class="col-md-4" style="margin-bottom: 10px;">
           <div class="card">
                    <div class="card-header">
                       <b class="card-title text-center text-success">Admit Card</b>
                       <div class="card-tools"></div>
                    </div>
                    <div class="card-body p-0">
                      <div class="card-body">
                          @foreach ($admit as $admits)
                           <a href="{{ $admits->url }}">{{ $admits->job_title }}</a><span class="text-danger"> (Opening Date: {{$admits->opening_date}})</span><br>
                           @endforeach
                      </div>
                      <div class="card-footer">
                          <a href="{{route('admitCard')}}" target="_blank" class="right btn btn-sm btn-info">View All</a>
                      </div>
                    </div>
            </div>
        </div>
        <div class="col-md-4" style="margin-bottom: 10px;">
           <div class="card">
                    <div class="card-header">
                        <b class="card-title text-center text-success">Results</b>
                       <div class="card-tools"></div>
                    </div>
                    <div class="card-body p-0">
                      <div class="card-body">
                           @foreach ($res as $res)
                           <a href="{{ $res->url }}">{{ $res->job_title }}</a><span class="text-danger"> (Opening Date: {{$res->opening_date}})</span><br>
                           @endforeach
                      </div>
                      <div class="card-footer">
                          <a href="{{route('result')}}" target="_blank" class="right btn btn-sm btn-info">View All</a>
                      </div>
                    </div>
            </div>
        </div>

<div class="col-sm-12">
    <div class="card">
      <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- onlinefill -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-8778607274843108"
     data-ad-slot="4138118427"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
    </div>
       
</div>
@endsection
