<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Micro Blog Application</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./assets/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <style>
        .accordion-content {
            display: none;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .hide {
            display: none;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        div.accordion-content.show {
            display: block;
        }

        .accordion-content.show {
            display: table-row;
            width: 100%;
            opacity: 1;
            animation-name: expand;
            animation-duration: 0.3s;
            animation-timing-function: ease;
        }

        @keyframes expand {
            0% {
                opacity: 0;
                max-height: 0;
            }

            100% {
                opacity: 1;
                max-height: 500px;
                /* Adjust the height as needed */
            }
        }

        img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
            border-style: solid;
            border-width: 3px;
            border-color: #ca821b;
            padding: 10px;
        }
    </style>
</head>

<body>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="bootstrap" viewBox="0 0 118 94">
            <title>Bootstrap</title>
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z">
            </path>
        </symbol>
        <symbol id="facebook" viewBox="0 0 16 16">
            <path
                d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
        </symbol>
        <symbol id="instagram" viewBox="0 0 16 16">
            <path
                d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
        </symbol>
        <symbol id="twitter" viewBox="0 0 16 16">
            <path
                d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
        </symbol>
    </svg>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Micro Blog</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contents</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Accounts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Modules</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav> 
    </header>
    <main>
        <!-- <div class="logos container d-flex align-items-center justify-content-center">
            <div class="d-inline m-2"> <img src="assets/images/eldz-ml-cmyk-logo.jpg" /> </div>
            <div class="d-inline m-2"> <img src="assets/images/giz-logo.jpg" /> </div>
            <div class="d-inline m-2"> <img src="assets/images/hfhd-logo.png" /> </div>
        </div> -->
        <div class="container py-4" id="posts-dashboard">
            <h2>Posts Management</h2>
            <div class="d-flex justify-content-end mb-3">
                <a class="btn btn-primary btn-action" data-id="0" data-action="create">Create</a>
            </div>
            <div class="accordion-content" id="post-content-0">
                <form id="create-form" class="card p-3" method="post" action="http://localhost:3000/posts">
                    <div class="mb-3">
                        <label for="postInputTitle" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" id="postInputTitle"
                            aria-describedby="emailHelp">
                        <div id="titleHelp" class="form-text">Write down the meaningful title.</div>
                    </div>
                    <div class="mb-3">
                        <label for="postInputContent" class="form-label">Content</label>
                        <textarea rows="5" type="text" class="form-control" name="content"
                            id="postInputContent"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
                <div class="mb-5"></div>
            </div>
            <table class="table  table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>


        </div>
    </main>

    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 px-5 my-4 border-top">
        <div class="col-md-4 d-flex align-items-center">
            <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                <svg class="bi" width="30" height="24">
                    <use xlink:href="#bootstrap" />
                </svg>
            </a>
            <span class="text-muted">&copy; 2023 Micro Blog, LLC</span>
        </div>

        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
            <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24">
                        <use xlink:href="#twitter" />
                    </svg></a></li>
            <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24">
                        <use xlink:href="#instagram" />
                    </svg></a></li>
            <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24">
                        <use xlink:href="#facebook" />
                    </svg></a></li>
        </ul>
    </footer>

    <!-- Bootstrap JS -->
    <script src="./assets/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
    <script>

        // Create a new XMLHttpRequest object
        const xhr = new XMLHttpRequest();

        //#region Load Posts from server

        // Define the API endpoint URL
        const url = 'http://localhost:3000/posts';
        // Define the request method and URL
        xhr.open('GET', url, true);

        // Set the request headers (if required)
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.onload = function () {
            if (xhr.status === 200) {
                let object = JSON.parse(xhr.responseText)
                // alert(object[0].Id)
                document.getElementsByTagName('tbody')[0].innerHTML = '';
                object.forEach(function (post) {
                    document.getElementsByTagName('tbody')[0].innerHTML += `
                    <tr id="post-${post.Id}">
                        <td>${post.Id}</td>
                        <td>${post.title}</td>
                        <td>
                            <a class="btn btn-sm btn-secondary btn-action" data-id="${post.Id}" data-action="view">View</a>
                            <a class="btn btn-sm btn-primary btn-action" data-id="${post.Id}" data-action="update">Update</a>
                            <a class="btn btn-sm btn-danger btn-action" data-id="${post.Id}" data-action="delete">Delete</a>
                        </td>
                    </tr>
                    <tr class="accordion-content" id="post-content-${post.Id}">
                        <td class="w-100" colspan="3">
                            <div class="card p-2 my-3 post-view hide">
                                <h3>${post.Id} ${post.title}</h3>
                                <div>
                                    ${post.content}
                                </div>
                                <!-- Content to be displayed when the "View" button is clicked -->
                            </div>
                            <div class="card p-2 my-3 post-update hide">
                                <form class="card p-3 update-form">
                                    <div class="mb-3">
                                        <input type="hidden" value="${post.Id}"> 
                                        <label for="postInputTitle" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="postInputTitle"
                                            aria-describedby="emailHelp" name="title" value="${post.title}">
                                        <div id="titleHelp" class="form-text">Write down the meaningful title.</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="postInputContent" class="form-label">Content</label>
                                        <textarea rows="5" type="text" name="content" class="form-control"
                                            id="postInputContent">${post.content}</textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                            </div>
                            <div class="card p-2 my-3 post-delete hide">
                                <form class="card p-3 delete-form">
                                    <input type="hidden" value="${post.Id}"> 
                                    <div class="mb-3">
                                        <label for="postInputContent" class="form-label">Are you soure you want to delete this.</label>
                                    </div>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>`
                });
                addEvents();
                updateAction();
                delteAction();
            } else {
                console.error(xhr.responseText);
            }
        }
        xhr.send();

        //#endregion

        //#region Add Register

        document.getElementById('create-form').addEventListener('submit', function (event) {
            event.preventDefault();

            // const url = 'http://localhost:8080/posts';

            xhr.open('POST', url, true);
            xhr.setRequestHeader('Content-Type', 'application/json');
            // Define the request payload
            const payload = new FormData(this);
            // Convert the payload to JSON string
            const payloadJson = JSON.stringify(Object.fromEntries(payload.entries()));
            xhr.onload = function () {
                if (xhr.status === 201) {
                    let newPost = JSON.parse(xhr.responseText);
                    document.getElementsByTagName('tbody')[0].innerHTML += `
                    <tr id="post-${newPost.Id}">
                        <td>${newPost.Id}</td>
                        <td>${newPost.title}</td>
                        <td>
                            <a class="btn btn-sm btn-secondary btn-action" data-id="${newPost.Id}" data-action="view">View</a>
                            <a class="btn btn-sm btn-primary btn-action" data-id="${newPost.Id}" data-action="update">Update</a>
                            <a class="btn btn-sm btn-danger btn-action" data-id="${newPost.Id}" data-action="delete">Delete</a>
                        </td>
                    </tr>
                    <tr class="accordion-content" id="post-content-${newPost.Id}">
                        <td class="w-100" colspan="3">
                            <div class="card p-2 my-3 post-view hide">
                                <h3>#id ${newPost.title}</h3>
                                <div>
                                    ${newPost.content}
                                </div>
                                <!-- Content to be displayed when the "View" button is clicked -->
                            </div>
                            <div class="card p-2 my-3 post-update hide">
                                <form class="card p-3 update-form">
                                    <div class="mb-3">
                                        <input type="hidden" value="${newPost.Id}"> 
                                        <label for="postInputTitle" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="postInputTitle"
                                            aria-describedby="emailHelp" name="title" value="${newPost.title}">
                                        <div id="titleHelp" class="form-text">Write down the meaningful title.</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="postInputContent" class="form-label">Content</label>
                                        <textarea rows="5" type="text" name="content" class="form-control"
                                            id="postInputContent">${newPost.content}</textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                            </div>
                            <div class="card p-2 my-3 post-delete hide">
                                <form class="card p-3 delete-form">
                                    <input type="hidden" value="${newPost.Id}"> 
                                    <div class="mb-3">
                                        <label for="postInputContent" class="form-label">Are you soure you want to delete this.</label>
                                    </div>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>`
                    addEvents();
                    updateAction();
                    document.getElementById('create-form').reset();
                } else {
                    console.error('Error creating post.');
                    console.error(xhr.responseText);
                }
            };
            // Send the request with the payload
            xhr.send(payloadJson);
        });

        //#endregion 

        //#region Edit Register
        const updateAction = () => {
            const updateForms = document.querySelectorAll('.update-form')
            updateForms.forEach(updateForm => {
                updateForm.addEventListener('submit', function (event) {
                    event.preventDefault();
                    const postId = this.querySelector('input[type="hidden"]').value;
                    // Define the request payload
                    const payload = new FormData(this);
                    // Convert the payload to JSON string
                    const payloadJson = JSON.stringify(Object.fromEntries(payload.entries()));
                    // Perform an asynchronous request (e.g., using AJAX or Fetch API).
                    fetch('http://localhost:3000/posts/' + postId, {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: payloadJson,
                    })
                        .then(response => response.json())
                        .then(data => {
                            const postElement = document.getElementById(`post-${postId}`);
                            postElement.querySelector('td:nth-child(2)').innerHTML = data.title;

                            const contentElement = document.getElementById(`post-content-${postId}`);
                            contentElement.querySelector('h3').innerHTML = `#${postId} ${data.title}`;
                            contentElement.querySelector('div').innerHTML = data.content;
                        })
                        .catch(error => {
                            // Handle errors.
                            console.error('Error:', error);
                        });
                });
            });
        }


        //#endregion 

        //#region Delet Register

        const delteAction = () => {
            const updateForms = document.querySelectorAll('.delete-form')
            updateForms.forEach(updateForm => {
                updateForm.addEventListener('submit', function (event) {
                    event.preventDefault();
                    const postId = this.querySelector('input[type="hidden"]').value;

                    // Perform an asynchronous request (e.g., using AJAX or Fetch API).
                    fetch('http://localhost:3000/posts/' + postId, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                    })
                        .then(response => {
                            if (response.status === 204) {
                                const postElement = document.getElementById(`post-${postId}`);
                                postElement.remove();

                                const contentElement = document.getElementById(`post-content-${postId}`);
                                contentElement.remove();
                            } else {
                                return response.json(); // Continue parsing for other status codes
                            }
                        })
                        .then(data => {
                            // Handle other status codes if needed
                            if (data) {
                                console.log('Error:', data);
                            }
                        })
                        .catch(error => {
                            // Handle other errors
                            console.error('Error:', error);
                        });
                });
            });
        }

        //#region 

        //#region addEvents

        // Function to handle the action buttons
        function handleAction(postId, action) {
            // Perform the desired action based on the button clicked
            if (action === 'view') {
                // Get the corresponding accordion content
                const accordionContent = document.querySelector(`#post-content-${postId}`);
                const postView = accordionContent.querySelectorAll('.post-view')[0];
                const postUpdate = accordionContent.querySelectorAll('.post-update')[0];
                const postDelete = accordionContent.querySelectorAll('.post-delete')[0];
                postView.classList.remove('hide');
                postUpdate.classList.remove('hide');
                postDelete.classList.remove('hide');
                postUpdate.classList.add('hide');
                postDelete.classList.add('hide');
                // console.log(accordionContent);
                // Toggle the visibility of the accordion content
                accordionContent.classList.toggle('show');
            } else if (action === 'update') {
                // Perform update action
                console.log(`Update post with ID: ${postId}`);
                // Get the corresponding accordion content
                const accordionContent = document.querySelector(`#post-content-${postId}`);
                const postView = accordionContent.querySelectorAll('.post-view')[0];
                const postUpdate = accordionContent.querySelectorAll('.post-update')[0];
                const postDelete = accordionContent.querySelectorAll('.post-delete')[0];
                postView.classList.remove('hide');
                postUpdate.classList.remove('hide');
                postDelete.classList.remove('hide');
                postView.classList.add('hide');
                postDelete.classList.add('hide');
                // Toggle the visibility of the accordion content
                accordionContent.classList.toggle('show');
            } else if (action === 'delete') {
                // Perform delete action
                console.log(`Delete post with ID: ${postId}`);
                // Get the corresponding accordion content
                const accordionContent = document.querySelector(`#post-content-${postId}`);
                const postView = accordionContent.querySelectorAll('.post-view')[0];
                const postUpdate = accordionContent.querySelectorAll('.post-update')[0];
                const postDelete = accordionContent.querySelectorAll('.post-delete')[0];
                postView.classList.remove('hide');
                postUpdate.classList.remove('hide');
                postDelete.classList.remove('hide');
                postView.classList.add('hide');
                postUpdate.classList.add('hide');
                // Toggle the visibility of the accordion content
                accordionContent.classList.toggle('show');
            } else {
                // Perform create action
                console.log(`Create post with ID: ${postId}`);
                // Get the corresponding accordion content
                const accordionContent = document.querySelector(`#post-content-${postId}`);
                // Toggle the visibility of the accordion content
                accordionContent.classList.toggle('show');
            }
        }


        const addEvents = () => {
            // Get all the action buttons
            const actionButtons = document.querySelectorAll('.btn-action');
            // Add click event listener to each action button
            actionButtons.forEach(actionButton => {
                actionButton.addEventListener('click', () => {
                    // Get the post ID from the data attribute
                    const postId = actionButton.dataset.id;

                    // Get the action from the data attribute
                    const action = actionButton.dataset.action;

                    //
                    console.log(`Action post button clicked of ID: ${postId} and Action: ${action}`);

                    // Call the handleAction function with the post ID and action
                    handleAction(postId, action);
                });
            });
        }

        //#endregion

    </script>
</body>

</html>