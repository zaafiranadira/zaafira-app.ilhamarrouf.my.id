@extends('templates.default')

@section('content')

    <div class="card">
        <div class="card-body"></div>
            <form action="{{route('student.update', $student->id) }}" class="" method="post">
                @csrf
                @method('PUT')

                <div class="mb-3">
                              <label class="form-label">Nama</label>
                              <input type="text" name="name" class="form-control
                              @error('name')
                                is-invalid
                              @enderror"
                                name="example-text-input" 
                                placeholder="Input Nama anda" value="{{ old('name') ?? $student->name }}">
                </div>

                <div class="mb-3">
                              <label class="form-label">Alamat</label>
                              <input type="text" name="address" class="form-control
                              @error('address')
                                is-invalid
                              @enderror"
                              name="example-text-input"
                              placeholder="Input Alamat anda" value="{{ old('address') ?? $student->addres }}">
                </div>

                <div class="mb-3">
                              <label class="form-label">Nomor HP</label>
                              <input type="text" name="phone_number" class="form-control
                              @error('phone_number')
                                is-invalid
                              @enderror"
                              name="example-text-input"
                              placeholder="Input Nomor HP anda "value="{{ old('phone_number') ?? $student->phone_number }}">
                </div>

                <div class="mb-3">
                              <label class="form-label">Kelas</label>
                              <input type="text" name="class" class="form-control
                              @error('class')
                                is-invalid
                              @enderror"
                              name="example-text-input"
                              placeholder="Input kelas anda"value="{{ old('class') ?? $student->class }}">
                </div>
                </div>

                <div class="mb-3">
                            <input type="submit" value="simpan" class="submit btn btn">
            </form>

        </div>
    </div>
@endsection
