@extends('layouts.app')

@section('content')
    <main class="h-full pb-16 overflow-y-auto">
      <div class="container px-6 mx-auto grid">

        <!-- General elements -->
        <div
          class="my-8 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
        >
          <div class="py-2 bg-purple-600 border border-2 text-2xl text-center text-white font-semibold rounded-t-lg">Detail Data Penduduk</div>
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
              <p>: {{ $villagers->id_number }}</p>
              <p>: {{ $villagers->name }}</p>
              <p>: {{ $villagers->birth_place }},{{ $villagers->birth_date }}</p>
              <p>: {{ $villagers->age }}</p>
              <p>: {{ $villagers->gender }}</p>
              <p>: {{ $villagers->blood_type }}</p>
              <p>: {{ $villagers->address }}</p>
              <p>: {{ $villagers->religion }}</p>
              <p>: {{ $villagers->marital_status }}</p>
              <p>: {{ $villagers->citizenship }}</p>
              <p>: {{ $villagers->education }}</p>
              <p>: {{ $villagers->parent }}</p>
            </div>
          </div>
        </div>
      </div>
    </main>
@endsection