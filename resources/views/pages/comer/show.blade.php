@extends('layouts.app')

@section('content')
    <main class="h-full pb-16 overflow-y-auto">
      <div class="container px-6 mx-auto grid">

        <!-- General elements -->
        <div
          class="my-8 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
        >
          <div class="py-2 bg-purple-600 border border-2 text-2xl text-center text-white font-semibold rounded-t-lg">Detail Data Pendatang</div>
          <div class="px-10 py-4 flex">
            <img width="400" src="{{ asset('People-sample.jpg') }}" alt="">
            <div class="ml-4">
              <p>NIK</p>
              <p>Nama</p>
              <p>Tempat/Tanggal Lahir</p>
              <p>Usia</p>
              <p>Jenis Kelamin</p>
              <p>Golongan Darah</p>
              <p>Alamat</p>
              <p>Agama</p>
              <p>Status</p>
              <p>Kewarganegaraan</p>
              <p>Pendidikan</p>
              <p>Orang Tua</p>
            </div>
            <div class="ml-4">
              <p>: {{ $comers->id_number }}</p>
              <p>: {{ $comers->name }}</p>
              <p>: {{ $comers->birth_place }},{{ $comers->birth_date }}</p>
              <p>: {{ $comers->age }}</p>
              <p>: {{ $comers->gender }}</p>
              <p>: {{ $comers->blood_type }}</p>
              <p>: {{ $comers->address }}</p>
              <p>: {{ $comers->religion }}</p>
              <p>: {{ $comers->marital_status }}</p>
              <p>: {{ $comers->citizenship }}</p>
              <p>: {{ $comers->education }}</p>
              <p>: {{ $comers->parent }}</p>
            </div>
          </div>
        </div>
      </div>
    </main>
@endsection