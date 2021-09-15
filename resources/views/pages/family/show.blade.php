@extends('layouts.app')

@section('content')
    <main class="h-full pb-16 overflow-y-auto">
      <div class="container px-6 mx-auto grid">

        <!-- General elements -->
        <div
          class="my-8 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
        >
          <div class="py-2 bg-purple-600 border border-2 text-2xl text-center text-white font-semibold rounded-t-lg">Detail Kartu Keluarga</div>
          <div class="px-10 py-4 flex">
            <img width="400" src="{{ asset('kk.png') }}" alt="">
              <div class="flex-col ml-4">
                <div class="flex">
                  <div>
                    <p>Nomor KK</p>
                    <p>Kepala Keluarga</p>
                    <p>Alamat</p>
                    <p>Desa</p>
                    <p>Kecamatan</p>
                    <p>Kabupaten</p>
                    <p>Provinsi</p>
                    <p>Kode Pos</p>
                    </p>
                  </div>
                  <div class="ml-4">
                    <p>: {{ $families->family_number }}</p>
                    <p>: <a class="font-semibold text-purple-600" href="{{ route('villager.show', $families->villager->id) }}">{{ $families->villager->name }}</a></p>
                    <p>: {{ $families->address }}
                    <p>: {{ $families->village }}</p>
                    <p>: {{ $families->sub_district }}</p>
                    <p>: {{ $families->district }}</p>
                    <p>: {{ $families->province }}</p>
                    <p>: {{ $families->postal_code }}</p>
                  </div>
                </div>
                <div class="flex">
                  <div class="w-full flex justify-between text-purple-600 mt-4">
                    <div>
                      <a
                        href="{{ route('familiar.create', $families->id) }}"
                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                      >
                        <span>Tambah Anggota Keluarga</span> &nbsp;&nbsp;&nbsp;
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                      </a>
                    </div>
                  </div>
                  {{-- <div class="w-full flex justify-between text-purple-600 mt-4 ml-4">
                    <div>
                      <a
                        href="{{ route('familiar.create_exists', $families->id) }}"
                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                      >
                        <span>Tambah Anggota Keluarga <br> (Yang sudah terdata)</span> &nbsp;&nbsp;&nbsp;
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                      </a>
                    </div>
                  </div>
                </div> --}}
              </div>
          </div>
        </div>
      </div>
      <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
          <div class="mt-8 overflow-hidden rounded-lg shadow-xs">
            <div class="py-2 bg-purple-600 border border-2 text-2xl text-center text-white font-semibold rounded-t-lg">Daftar Anggota Keluarga</div>
            <div class="overflow-x-auto">
              <table id="data-table">
                <thead>
                  <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                  >
                    <th class="px-4 py-3">No</th>
                    <th class="px-4 py-3">Nama</th>
                    <th class="px-4 py-3">Hubungan</th>
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
                @foreach ($familiars as $index=>$familiar)
                <tbody
                  class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                >
                  <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3">
                      {{ $index+1 }}
                    </td>
                    <td class="px-4 py-3">
                      {{ $families->villager->name }}
                    </td>
                    <td class="px-4 py-3">
                      {{ $families->villager->kinship }}
                    </td>
                    <td class="px-4 py-3">
                      {{ $families->villager->id_number }}
                    </td>
                    <td class="px-4 py-3">
                      {{ $families->villager->age }}
                    </td>
                    <td class="px-4 py-3">
                      {{ $families->villager->birth_place }}
                    </td>
                    <td class="px-4 py-3">
                      {{ $families->villager->birth_date }}
                    </td>
                    <td class="px-4 py-3">
                      {{ $families->villager->gender }}
                    </td>
                    <td class="px-4 py-3">
                      {{ $families->villager->religion }}
                    </td>
                    <td class="px-4 py-3">
                      {{ $families->villager->blood_type }}
                    </td>
                    <td class="px-4 py-3">
                      {{ $families->villager->marital_status }}
                    </td>
                    <td class="px-4 py-3">
                      {{ $families->villager->citizenship }}
                    </td>
                    <td class="px-4 py-3">
                      {{ $families->villager->education }}
                    </td>
                    <td class="px-4 py-3">
                      {{ $families->villager->parent }}
                    </td>
                    <td class="px-4 py-3">
                      {{ $families->villager->address }}
                    </td>
                    <td class="px-4 py-3">
                      {{ $families->villager->id_photo }}
                    </td>
                    <td class="px-4 py-3 flex flex-column">
                      <a href="{{ route('villager.show', $families->villager->id) }}"
                        class="mr-2 px-3 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                      >
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z">
                          </path>
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                          </path>
                        </svg>
                      </a>
                      <a href="{{ route('villager.edit', $families->villager->id) }}"
                        class="mr-2 px-3 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                      >
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                          </path>
                        </svg>
                      </a>
                      <form action="{{ route('villager.destroy', $families->villager->id) }}" method="POST">
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
                  <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3">
                      {{ $index+1 }}
                    </td>
                    <td class="px-4 py-3">
                      {{ $familiar->name }}
                    </td>
                    <td class="px-4 py-3">
                      {{ $familiar->kinship }}
                    </td>
                    <td class="px-4 py-3">
                      {{ $familiar->id_number }}
                    </td>
                    <td class="px-4 py-3">
                      {{ $familiar->age }}
                    </td>
                    <td class="px-4 py-3">
                      {{ $familiar->birth_place }}
                    </td>
                    <td class="px-4 py-3">
                      {{ $familiar->birth_date }}
                    </td>
                    <td class="px-4 py-3">
                      {{ $familiar->gender }}
                    </td>
                    <td class="px-4 py-3">
                      {{ $familiar->religion }}
                    </td>
                    <td class="px-4 py-3">
                      {{ $familiar->blood_type }}
                    </td>
                    <td class="px-4 py-3">
                      {{ $familiar->marital_status }}
                    </td>
                    <td class="px-4 py-3">
                      {{ $familiar->citizenship }}
                    </td>
                    <td class="px-4 py-3">
                      {{ $familiar->education }}
                    </td>
                    <td class="px-4 py-3">
                      {{ $familiar->parent }}
                    </td>
                    <td class="px-4 py-3">
                      {{ $familiar->address }}
                    </td>
                    <td class="px-4 py-3">
                      {{ $familiar->id_photo }}
                    </td>
                    <td class="px-4 py-3 flex flex-column">
                      <a href="{{ route('villager.show', $familiar->id) }}"
                        class="mr-2 px-3 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                      >
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z">
                          </path>
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                          </path>
                        </svg>
                      </a>
                      <a href="{{ route('villager.edit', $familiar->id) }}"
                        class="mr-2 px-3 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                      >
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                          </path>
                        </svg>
                      </a>
                      <form action="{{ route('villager.destroy', $familiar->id) }}" method="POST">
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
                @endforeach
              </table>
            </div>
          </div>
        </div>
      </main>  
    </main>
@endsection