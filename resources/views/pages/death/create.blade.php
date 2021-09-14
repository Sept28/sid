@extends('layouts.app')

@section('content')
    <main class="h-full pb-16 overflow-y-auto">
      <div class="container px-6 mx-auto grid">
        <a
          class="my-6 flex items-center justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-blue-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"
        >
          <div class="flex items-center">
            <svg
              class="w-5 h-5 mr-2"
              fill="currentColor"
              viewBox="0 0 20 20"
            >
              <path
                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
              ></path>
            </svg>
            <span>Tambah Data Kematian</span>
          </div>
          <span></span>
        </a>

        <div
          class="px-10 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
        >
          <form action="{{ route('death.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(Session::has('success'))
                  <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                  </div>
              @endif
              @if ($errors->any())
                <div class="bg-gray-800">
                  <ul class="bg-gray-800">
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                  </ul>
                </div>
              @endif

            {{-- Villager Name --}}
            <label class="block mt-4 text-sm">
              <span class="text-gray-700 dark:text-gray-400">
                Pilih Penduduk
              </span>
              <select
                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                name="villager_id"
              >
                @foreach ($villagers as $villager)
                  <option value="{{ $villager->id }}">{{ $villager->id_number }} / {{ $villager->name }}</option>
                @endforeach
              </select>
            </label>

            {{-- Date --}}
            <div class="mt-4 text-sm">
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Tanggal Kematian</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  name="obit"
                  type="date"
                  />
              </label>
            </div>

            {{-- Cause --}}
            <div class="mt-4 text-sm">
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Penyebab</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Sakit / Usia Tua"
                  name="cause"
                  type="text"
                />
              </label>
            </div>

            <div class="my-6 flex justify-end">
              <button
                class="flex items-center px-4 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
              >
              <span>Tambah Data</span> &nbsp;&nbsp;&nbsp;
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
              </button>
            </div>
          </form>
        </div>
      </div>
    </main>
@endsection