@extends('layouts.app')
@section('content')
        <div class="col-sm-10">
            <div class="card">
            <div class="view view-cascade gradient-card-header purple-gradient narrower py-4 mx-4 mb-3 d-flex justify-content-center align-items-center">
                <h4 class="green-text font-weight-bold text-uppercase mb-0">Download Admit Card</h4>
            </div>
            <div class="px-4">
                <table class="table table-hover table-responsive">
                    <thead>
                        <tr>
                            <th class="th-lg">Title</th>
                            <th class="th-lg">Opening Date</th>
                            <th class="th-lg">Exam Date</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                         @foreach ($res as $card)
                           <tr>         
                               <td><b class="blue-text">{{ $card->job_title }}</b></td>
                               <td class="green-text">{{ $card->opening_date }}</td>
                               <td class="purple-text">{{ $card->exam_date }}</td>
                               <td><a class="btn btn-blue btn-sm" href="{{ $card->url }}" target="_blank" role="button">Download Link</a></td>
                            </tr>
                         @endforeach
                    </tbody>
                </table>
            </div>
            <hr class="my-0">
            <div class="d-flex justify-content-center">
                <nav class="my-4 pt-2">
                     {{ $res->links() }}
                </nav>
            </div>
        </div>
    </div>
<div class="col-sm-2">
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

