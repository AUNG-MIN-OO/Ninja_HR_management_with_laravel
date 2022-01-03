@foreach($biometric as $data)
    <button type="submit" disabled class="btn shadow-sm biometric-data" style="padding: 20px 10px;width: 120px;border-radius: 20px">
        <i class="fas fa-fingerprint fa-4x primary-text"></i>
        <p class="mb-0 mt-2 text-capitalize">Biometric {{$loop->iteration}}</p>
    </button>
@endforeach
