<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body>

    <div class="drawer lg:drawer-open">
        <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content">
            <div class="navbar bg-base-100">
                <div class="container mx-auto">
                    <div class="flex-1">
                        <p class="font-semibold">
                            Sta. Cruz Learning Center
                        </p>
                    </div>
                    <div class="flex-none">
                        {{-- <button class="btn btn-square btn-ghost">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        class="inline-block h-5 w-5 stroke-current">
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                      </svg>
                    </button> --}}

                        <a href="/logout" class="btn btn-sm btn-ghost">
                            <span>
                                <svg width="24" height="24" fill="none" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.502 11.5a1.002 1.002 0 1 1 0 2.004 1.002 1.002 0 0 1 0-2.004Z"
                                        class="fill-base-content" />
                                    <path
                                        d="M12 4.354v6.651l7.442-.001L17.72 9.28a.75.75 0 0 1-.073-.976l.073-.084a.75.75 0 0 1 .976-.073l.084.073 2.997 2.997a.75.75 0 0 1 .073.976l-.073.084-2.996 3.004a.75.75 0 0 1-1.134-.975l.072-.085 1.713-1.717-7.431.001L12 19.25a.75.75 0 0 1-.88.739l-8.5-1.502A.75.75 0 0 1 2 17.75V5.75a.75.75 0 0 1 .628-.74l8.5-1.396a.75.75 0 0 1 .872.74Zm-1.5.883-7 1.15V17.12l7 1.236V5.237Z"
                                        class="fill-base-content" />
                                    <path
                                        d="M13 18.501h.765l.102-.006a.75.75 0 0 0 .648-.745l-.007-4.25H13v5.001ZM13.002 10 13 8.725V5h.745a.75.75 0 0 1 .743.647l.007.102.007 4.251h-1.5Z"
                                        class="fill-base-content" />
                                </svg>
                            </span>
                            Sign Out
                        </a>
                    </div>
                </div>
            </div>


            <div class="container mx-auto">
                <br>

                <h3 class="text-lg font-semibold">User Management</h3>
                <br>
                <div class="flex justify-between">
                    <input type="text" class="input input-bordered" placeholder="Search">

                    <div>
                        <button onclick="my_modal_1.showModal()" href="{{ URL::to('/admin/add-user') }}"
                            class="btn btn-primary flex items-center">
                            <span>
                                <svg width="16" height="16" fill="none" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.883 3.007 12 3a1 1 0 0 1 .993.883L13 4v7h7a1 1 0 0 1 .993.883L21 12a1 1 0 0 1-.883.993L20 13h-7v7a1 1 0 0 1-.883.993L12 21a1 1 0 0 1-.993-.883L11 20v-7H4a1 1 0 0 1-.993-.883L3 12a1 1 0 0 1 .883-.993L4 11h7V4a1 1 0 0 1 .883-.993L12 3l-.117.007Z"
                                        class="fill-white" />
                                </svg>
                            </span>
                            Add User</button>
                    </div>
                </div>
                <br>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td align="right">
                                    <button class="btn btn-sm btn-ghost">
                                        <svg width="16" height="16" fill="none" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M13.94 5 19 10.06 9.062 20a2.25 2.25 0 0 1-.999.58l-5.116 1.395a.75.75 0 0 1-.92-.921l1.395-5.116a2.25 2.25 0 0 1 .58-.999L13.938 5Zm7.09-2.03a3.578 3.578 0 0 1 0 5.06l-.97.97L15 3.94l.97-.97a3.578 3.578 0 0 1 5.06 0Z"
                                                class="fill-primary" />
                                        </svg>
                                    </button>
    
                                    <button class="btn btn-sm btn-ghost">
                                        <svg width="16" height="16" fill="none" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M21.5 6a1 1 0 0 1-.883.993L20.5 7h-.845l-1.231 12.52A2.75 2.75 0 0 1 15.687 22H8.313a2.75 2.75 0 0 1-2.737-2.48L4.345 7H3.5a1 1 0 0 1 0-2h5a3.5 3.5 0 1 1 7 0h5a1 1 0 0 1 1 1Zm-7.25 3.25a.75.75 0 0 0-.743.648L13.5 10v7l.007.102a.75.75 0 0 0 1.486 0L15 17v-7l-.007-.102a.75.75 0 0 0-.743-.648Zm-4.5 0a.75.75 0 0 0-.743.648L9 10v7l.007.102a.75.75 0 0 0 1.486 0L10.5 17v-7l-.007-.102a.75.75 0 0 0-.743-.648ZM12 3.5A1.5 1.5 0 0 0 10.5 5h3A1.5 1.5 0 0 0 12 3.5Z"
                                                class="fill-error" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
        <div class="drawer-side">
            <label for="my-drawer-2" aria-label="close sidebar" class="drawer-overlay"></label>
            <ul class="menu bg-base-200 text-base-content min-h-full w-80 p-4">
                <!-- Sidebar content here -->
                <li><a>Sidebar Item 1</a></li>
                <li><a>Sidebar Item 2</a></li>
            </ul>
        </div>
    </div>


    <!-- Open the modal using ID.showModal() method -->
    <dialog id="my_modal_1" class="modal">
        <div class="modal-box flex items-center justify-center">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
              </form>
            <form id="add-user-form" action="{{ URL::to('/admin/add-user') }}" method="POST" class="w-96">
                @csrf
                <div class="card-body">
                    <h3 class="text-lg font-semibold">Add User</h3>
                    
                    <label class="form-control">
                        <div class="label">
                            <span class="label-text">Name</span>
                        </div>
                        <input type="text" name="name" class="input input-bordered w-full " value="{{ old('name') }}"/>
                        <div class="label">
                            <span id="name_error" class="label-text-alt text-error"></span>
                        </div>
                    </label>
    
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Email</span>
                        </div>
                        <input type="text" name="email" class="input input-bordered w-full " value="{{ old('email') }}"/>
                        <div class="label">
                            <span id="email_error" class="label-text-alt text-error"></span>
                        </div>
                    </label>
    
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Password</span>
                        </div>
                        <input type="password" name="password" class="input input-bordered w-full " value="{{ old('password') }}"/>
                        <div class="label">
                            <span id="password_error" class="label-text-alt text-error"></span>
                        </div>
                    </label>
    
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Role</span>
                        </div>
                        {{-- <input type="password" name="password" class="input input-bordered w-full " value="{{ old('password') }}"/> --}}

                        <select name="role" id="role" class="select select-bordered">
                            <option value="" disabled selected>-- Select Role</option>
                            <option value="student">Student</option>
                            <option value="teacher">Teacher</option>
                            <option value="admin">Admin</option>

                        </select>
                        <div class="label">
                            <span id="role_error" class="label-text-alt text-error"></span>
                        </div>
                    </label>
                    <button class="btn btn-primary w-full">Submit</button>
    
                </div>
            </form>
            {{-- <div class="modal-action">
                <form method="dialog">
                    <button class="btn">Close</button>
                </form>
            </div> --}}
        </div>
    </dialog>


    <script>
        const addUserForm = document.getElementById("add-user-form");

        addUserForm.addEventListener("submit", evt => {
            evt.preventDefault();
            const formData = new FormData(addUserForm);
            const url = addUserForm.getAttribute("action");

            fetch(url, {
                method: "POST",
                body: formData
            }).then(async val => {
                const data = await val.json();
                
                if (data.errors) {
                    for (const [key, value] of Object.entries(data.errors)) {
                        document.getElementById(`${key}_error`).innerText = value[0];
                    }
                    return;
                }

                location.reload();
            }).catch(err => {
                console.log(err.errors);
            })
        })
    </script>
</body>

</html>
