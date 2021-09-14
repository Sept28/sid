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
            <span>Buat penduduk Baru</span>
          </div>
          <span></span>
        </a>

        <div
          class="px-10 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
        >
          <form action="{{ route('villager.store') }}" method="POST" enctype="multipart/form-data">
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

              
            {{-- Name --}}
            <div class="mt-4 text-sm">
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Name</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Jane Doe"
                  name="name"
                  type="text"
                />
              </label>
            </div>
            
            {{-- ID Number --}}
            <div class="mt-4 text-sm">
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">NIK</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Jane Doe"
                  name="id_number"
                  type="number"
                />
              </label>
            </div>
  
            {{-- Age --}}
            <div class="mt-4 text-sm">
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Usia</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Jane Doe"
                  name="age"
                  type="number"
                />
              </label>
            </div>
              
            {{-- Birth Place --}}
            <div class="mt-4 text-sm">
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Tempat Lahir</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Jane Doe"
                  name="birth_place"
                  type="text"
                />
              </label>
            </div>
            
            {{-- Birth Date --}}
            <div class="mt-4 text-sm">
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Tanggal Lahir</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Jane Doe"
                  name="birth_date"
                  type="date"
                />
              </label>
            </div>
            
            {{-- Gender --}}
            <div class="mt-4 text-sm">
              <span class="text-gray-700 dark:text-gray-400">
                Gender
              </span>
              <div class="mt-2">
                <label
                  class="inline-flex items-center text-gray-600 dark:text-gray-400"
                >
                  <input
                    type="radio"
                    class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    name="gender"
                    value="L"
                  />
                  <span class="ml-2">Laki-Laki</span>
                </label>
                <label
                  class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400"
                >
                  <input
                    type="radio"
                    class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    name="gender"
                    value="P"
                  />
                  <span class="ml-2">Perempuan</span>
                </label>
              </div>
            </div>
  
            {{-- Religion --}}
            <label class="block mt-4 text-sm">
              <span class="text-gray-700 dark:text-gray-400">
                Agama
              </span>
              <select
                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                name="religion"
              >
                <option value="islam">Islam</option>
                <option value="kristen">Kristen</option>
                <option value="hindu">Hindu</option>
                <option value="budha">Budha</option>
                <option value="konguchu">Konghucu</option>
              </select>
            </label>

            {{-- Blood Type --}}
            <div class="mt-4 text-sm">
              <span class="text-gray-700 dark:text-gray-400">
                Golongan Darah
              </span>
              <div class="mt-2">
                <label
                  class="inline-flex items-center text-gray-600 dark:text-gray-400"
                >
                  <input
                    type="radio"
                    class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    name="blood_type"
                    value="A"
                  />
                  <span class="ml-2">A</span>
                </label>
                <label
                  class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400"
                >
                  <input
                    type="radio"
                    class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    name="blood_type"
                    value="B"
                  />
                  <span class="ml-2">B</span>
                </label>
                <label
                  class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400"
                >
                  <input
                    type="radio"
                    class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    name="blood_type"
                    value="AB"
                  />
                  <span class="ml-2">AB</span>
                </label>
                <label
                  class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400"
                >
                  <input
                    type="radio"
                    class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    name="blood_type"
                    value="O"
                  />
                  <span class="ml-2">O</span>
                </label>
              </div>
            </div>
  
            {{-- Education --}}
            <label class="block mt-4 text-sm">
              <span class="text-gray-700 dark:text-gray-400">
                Pendidikan
              </span>
              <select
                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                name="education"
                >
                <option value="SD">SD</option>
                <option value="SMP">SMP</option>
                <option value="SMA">SMK</option>
                <option value="S1">S1</option>
                <option value="S2">S2</option>
                <option value="S3">S3</option>
              </select>
            </label>
  
            {{-- Address --}}
            <label class="block mt-4 text-sm">
              <span class="text-gray-700 dark:text-gray-400">Alamat</span>
              <textarea
                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                rows="3"
                placeholder="Enter some long form content."
                name="address"
              ></textarea>
            </label>
  
            {{-- Status --}}
            <div class="mt-4 text-sm">
              <span class="text-gray-700 dark:text-gray-400">
                Status Perkawinan
              </span>
              <div class="mt-2">
                <label
                  class="inline-flex items-center text-gray-600 dark:text-gray-400"
                >
                  <input
                    type="radio"
                    class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    name="marital_status"
                    value="kawin"
                  />
                  <span class="ml-2">Kawin</span>
                </label>
                <label
                  class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400"
                >
                  <input
                    type="radio"
                    class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    name="marital_status"
                    value="belum kawin"
                  />
                  <span class="ml-2">Belum Kawin</span>
                </label>
              </div>
            </div>
            
            {{-- Citizenship --}}
            <div class="mt-4 text-sm">
              <span class="text-gray-700 dark:text-gray-400">
                Kewarganegaraan
              </span>
              <div class="mt-2">
                <label
                  class="inline-flex items-center text-gray-600 dark:text-gray-400"
                >
                  <input
                    type="radio"
                    class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    name="citizenship"
                    value="WNI"
                  />
                  <span class="ml-2">WNI</span>
                </label>
                <label
                  class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400"
                >
                  <input
                    type="radio"
                    class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    name="citizenship"
                    value="WNA"
                  />
                  <span class="ml-2">WNA</span>
                </label>
              </div>
            </div>

            <div class="flex mt-6 text-sm">
              <label class="flex items-center dark:text-gray-400">
                <input
                  type="checkbox"
                  class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                  value="kepala"
                  name="kinship"
                  />
                <span class="ml-2">
                  Kepala Keluarga
                </span>
              </label>
            </div>
  
            {{-- Parent --}}
            <div class="mt-4 text-sm">
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Nama Bapak/Ibu</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Jane Doe"
                  name="parent"
                  type="text"
                />
              </label>
            </div>
            
            {{-- ID Photo --}}
            <div class="mt-4 text-sm">
              <label>
                Masukan Foto KTP
                <input type="file"
                       placeholder="Foto KTP"
                       name="id_photo"
                       class="block"
                >
              </label>
            </div>

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