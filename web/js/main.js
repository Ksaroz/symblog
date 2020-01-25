const post = document.getElementById('post');

if(post) {
    post.addEventListener('click', e => {
       if(e.target.className === 'delete-post btn btn-danger text-light') {
           if(confirm('Are You Sure..?')) {
                const id = e.target.getAttribute('data-id');

                fetch(`/post/delete/${id}`, {
                    method: 'DELETE'
                }).then(res => window.location.reload());
           }
       }
    });
}