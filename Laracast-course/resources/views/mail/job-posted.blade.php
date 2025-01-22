<div>
    this is test mail for my application
    <span>you just post this {{ $job->title }}</span>
    <a href="{{ url('/jobs/' . $job->id) }}">check job here</a>
</div>
{{-- body of mail  --}}
