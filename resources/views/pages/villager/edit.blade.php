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
          <span>Ubah data penduduk</span>
        </div>
        <span></span>
      </a>

      <div
        class="px-10 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
      >
        <form action="{{ route('villager.update', $villagers->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
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
                value="{{ old('name', $villagers->name) }}"
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
                value="{{ old('id_number', $villagers->id_number) }}"
              />
            </label>
          </div>

          {{-- Family Number --}}
          <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">
              Tambahkan penduduk ke dalam sebuah KK
            </span>
            <select
              class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
              name="family_card_id"
            >
              <option value="0">Tidak</option>
              @foreach ($families as $family)
                <option value="{{ $family->id }}" {{ $villagers->family_card_id ? 'selected' : '' }}>{{ $family->family_number }} / {{ $family->villager->name }}</option>
              @endforeach
            </select>
          </label>

          {{-- Age --}}
          <div class="mt-4 text-sm">
            <label class="block text-sm">
              <span class="text-gray-700 dark:text-gray-400">Usia</span>
              <input
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="Jane Doe"
                name="age"
                type="number"
                value="{{ old('age', $villagers->age) }}"
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
                value="{{ old('birth_date', $villagers->birth_place) }}"
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
                value="{{ old('birth_date', $villagers->birth_date) }}"
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
                  {{ old('gender', $villagers->gender === 'L') ? 'checked' : ''}}
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
                  {{ old('gender', $villagers->gender === 'P') ? 'checked' : ''}}
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
              <option value="islam" {{ $villagers->religion === 'islam' ? 'selected' : '' }}>Islam</option>
              <option value="kristen" {{ $villagers->religion === 'kristen' ? 'selected' : '' }}>Kristen</option>
              <option value="hindu" {{ $villagers->religion === 'hindu' ? 'selected' : '' }}>Hindu</option>
              <option value="budha" {{ $villagers->religion === 'budha' ? 'selected' : '' }}>Budha</option>
              <option value="konguchu" {{ $villagers->religion === 'konguchu' ? 'selected' : '' }}>Konghucu</option>
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
                  {{ old('blood_type', $villagers->blood_type === 'A' ? 'checked' : '') }}
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
                  {{ old('blood_type', $villagers->blood_type === 'B' ? 'checked' : '') }}
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
                  {{ old('blood_type', $villagers->blood_type === 'AB' ? 'checked' : '') }}
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
                  {{ old('blood_type', $villagers->blood_type === 'O' ? 'checked' : '') }}
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
              <option value="SD" {{ old('education', $villagers->education === 'SD' ? 'selected' : '') }}>SD</option>
              <option value="SMP" {{ old('education', $villagers->education === 'SMP' ? 'selected' : '')}}>SMP</option>
              <option value="SMA" {{ old('education', $villagers->education === 'SMA' ? 'selected' : '')}}>SMK</option>
              <option value="S1" {{ old('education', $villagers->education === 'S1' ? 'selected' : '')}}>S1</option>
              <option value="S2" {{ old('education', $villagers->education === 'S2' ? 'selected' : '')}}>S2</option>
              <option value="S3" {{ old('education', $villagers->education === 'S3' ? 'selected' : '')}}>S3</option>
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
            >{{ $villagers->address }}</textarea>
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
                  {{ old('marital_status', $villagers->marital_status === 'kawin' ? 'checked' : '') }}
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
                  {{ old('marital_status', $villagers->marital_status === 'belum kawin' ? 'checked' : '') }}
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
                  {{ old('citizenship', $villagers->citizenship === 'WNI' ? 'checked' : '') }}
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
                  {{ old('citizenship', $villagers->citizenship === 'WNA' ? 'checked' : '') }}
                />
                <span class="ml-2">WNA</span>
              </label>
            </div>
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
                value="{{ $villagers->parent }}"
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
              type="submit"
              class="flex items-center px-4 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            >
            <span>Ubah Data Penduduk</span> &nbsp;&nbsp;&nbsp;
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
            </button>
          </div>
        </form>
      </div>
    </div>
  </main>
@endsection