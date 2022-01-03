@foreach($biometric as $data)
    <button type="submit" class="btn shadow-sm biometric-data position-relative" style="padding: 20px 10px;width: 120px;border-radius: 20px">
        <i class="fas fa-fingerprint fa-4x primary-text"></i>
        <p class="mb-0 mt-2 text-capitalize text-muted">Biometric {{$loop->iteration}}</p>
        <i class="fas fa-times delete-biometric" data-id="{{$data->id}}"></i>
    </button>
@endforeach
