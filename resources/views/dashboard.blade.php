<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @if (session('err'))
        <div class="flex items-center justify-center m-5">
            <aside class="bg-black text-white p-6 rounded-lg w-full max-w-lg font-mono">
              <div class="flex justify-between items-center">
                <div class="flex space-x-2 text-red-500">
                  <div class="w-3 h-3 rounded-full bg-red-500"></div>
                  <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                  <div class="w-3 h-3 rounded-full bg-green-500"></div>
                </div>
                <p class="text-sm">bash</p>
              </div>
              <div class="mt-4">
                <span class="text-green-400">{{ session('err') }}</span>
              </div>
            </aside>
          </div>
          
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <section >

                <div class="w-96 h-64 duration-500 group overflow-hidden relative rounded bg-neutral-800 text-neutral-50 p-4 flex flex-col justify-evenly">
                    <div class="absolute blur duration-500 group-hover:blur-none w-72 h-72 rounded-full group-hover:translate-x-12 group-hover:translate-y-12 bg-sky-900 right-1 -bottom-24">
                    </div>
                    <div class="absolute blur duration-500 group-hover:blur-none w-12 h-12 rounded-full group-hover:translate-x-12 group-hover:translate-y-2 bg-indigo-700 right-12 bottom-12">

                    </div>
                    <div class="absolute blur duration-500 group-hover:blur-none w-36 h-36 rounded-full group-hover:translate-x-12 group-hover:-translate-y-12 bg-indigo-800 right-1 -top-12">

                    </div>
                    <div class="absolute blur duration-500 group-hover:blur-none w-24 h-24 bg-sky-700 rounded-full group-hover:-translate-x-12"></div>
                    <div class="z-10 flex flex-col justify-evenly w-full h-full">
                        <span class="text-2xl font-bold">Chats</span>
                        <p>
                            Ingrese el correo de la persona con la que quiere conversar
                        </p>
                        <form action="{{ route('chat.with') }}" method="post">
                            @csrf
                   
                             <input type="text" class="relative bg-gray-50ring-0 outline-none border border-neutral-500 text-neutral-900 placeholder-violet-700 text-sm rounded-lg focus:ring-violet-500  focus:border-violet-500 block w-64 p-2.5 my-4 checked:bg-emerald-500" placeholder="Correo..." name="email">
                         

                            <button type="submit" class="hover:bg-neutral-200 bg-neutral-50 rounded text-neutral-800 font-extrabold w-full p-3">
                                Ir al chat
                           </button>
                        </form>
                    </div>
                    </div>

            </section>
        </div>
    </div>
</x-app-layout>
