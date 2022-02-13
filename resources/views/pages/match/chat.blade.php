@extends('layouts.app')

@section('content')

    <div class="chat bg-light p-4" style="height:630px;">
      <div class="message d-flex flex-row align-items-start mb-4">
        <div class="message-icon rounded-circle bg-secondary text-white fs-3">
          <i class="fas fa-user"></i>
        </div><!-- .message-icon -->
        <p class="message-text p-2 ms-2 mb-0 bg-warning">
          サンプルテキスト。サンプルテキスト。サンプルテキスト。サンプルテキスト。サンプルテキスト。
        </p><!-- .message-text -->
      </div><!-- .message -->
      <div class="message d-flex flex-row-reverse align-items-start mb-4">
        <div class="message-icon rounded-circle bg-secondary text-white fs-3">
          <i class="fas fa-user"></i>
        </div><!-- .message-icon -->
        <p class="message-text p-2 me-2 mb-0 bg-info">
          サンプルテキスト。サンプルテキスト。サンプルテキスト。サンプルテキスト。
        </p><!-- .message-text -->
      </div><!-- .message -->

    </div><!-- .chat -->
  </div>

@endsection
