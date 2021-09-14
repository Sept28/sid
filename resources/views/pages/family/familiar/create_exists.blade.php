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
            <span>Tambah anggota keluarga</span>
          </div>
          <span></span>
        </a>

        <div
          class="px-10 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
        >
          <form action="{{ route('familiar.store', $families->id) }}" method="POST" enctype="multipart/form-data">
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
                  
              <main class="h-full overflow-y-auto">
                <div class="container px-6 mx-auto grid">
                  <div class="mt-8 overflow-hidden rounded-lg shadow-xs">
                    <div class="overflow-x-auto">
                      <table id="data-table">
                        <thead>
                          <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                          >
                            <th class="px-4 py-3">No</th>
                            <th class="px-4 py-3">Nama</th>
                            <th class="px-4 py-3">NIK</th>
                            <th class="px-4 py-3">Usia</th>
                            <th class="px-4 py-3">Tempat Lahir</th>
                            <th class="px-4 py-3">Tanggal Lahir</th>
                            <th class="px-4 py-3">Jenis Kelamin</th>
                            <th class="px-4 py-3">Agama</th>
                            <th class="px-4 py-3">Golongan Darah</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Kewarganegaraan</th>
                            <th class="px-4 py-3">Pendidikan</th>
                            <th class="px-4 py-3">Orang Tua</th>
                            <th class="px-4 py-3">Alamat</th>
                            <th class="px-4 py-3">KTP</th>
                            <th class="px-4 py-3">Action</th>
                          </tr>
                        </thead>
                        <tbody
                          class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                        >
                          <tr class="text-gray-700 dark:text-gray-400">
                              <td class="px-4 py-3">
                                {{-- {{ $index+1 }} --}}
                              </td>
                              <td class="px-4 py-3">
                                {{ $familiars->name }}
                              </td>
                              <td class="px-4 py-3">
                                {{ $familiars->id_number }}
                              </td>
                              <td class="px-4 py-3">
                                {{ $familiars->age }}
                              </td>
                              <td class="px-4 py-3">
                                {{ $familiars->birth_place }},{{ $familiars->birth_date }}
                              </td>
                              <td class="px-4 py-3">
                                {{ $familiars->birth_date }}
                              </td>
                              <td class="px-4 py-3">
                                {{ $familiars->gender }}
                              </td>
                              <td class="px-4 py-3">
                                {{ $familiars->religion }}
                              </td>
                              <td class="px-4 py-3">
                                {{ $familiars->blood_type }}
                              </td>
                              <td class="px-4 py-3">
                                {{ $familiars->marital_status }}
                              </td>
                              <td class="px-4 py-3">
                                {{ $familiars->citizenship }}
                              </td>
                              <td class="px-4 py-3">
                                {{ $familiars->education }}
                              </td>
                              <td class="px-4 py-3">
                                {{ $familiars->parent }}
                              </td>
                              <td class="px-4 py-3">
                                {{ $familiars->address }}
                              </td>
                              <td class="px-4 py-3">
                                {{ $familiars->id_photo }}
                              </td>
                              <td class="px-4 py-3 flex flex-column">
                                <a href="{{ route('villager.show', $familiars->id) }}"
                                  class="mr-2 px-3 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                                >
                                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                    </path>
                                  </svg>
                                </a>
                                <a href="{{ route('villager.edit', $familiars->id) }}"
                                  class="mr-2 px-3 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                                >
                                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                    </path>
                                  </svg>
                                </a>
                                <form action="{{ route('villager.destroy', $familiars->id) }}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="px-3 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                      </path>
                                    </svg>
                                  </button>
                                </form>
                              </td>
                            </tr>
                          </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </main> 

            <div class="my-6 flex justify-end">
              <button
                class="flex items-center px-4 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
              >
              <span>Buat Penduduk</span> &nbsp;&nbsp;&nbsp;
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
              </button>
            </div>
          </form>
        </div>
      </div>
    </main>
@endsection