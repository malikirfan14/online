    </div> <!-- End of #admin-wrapper -->

    <!-- Lightbox Modal for Image Previews -->
    <div class="modal fade" id="imagePreviewModal" tabindex="-1" aria-hidden="true" style="z-index: 1060;">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content bg-transparent border-0">
                <div class="modal-header border-0 p-0 position-relative" style="height: 0;">
                    <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3 shadow-lg" data-bs-dismiss="modal" aria-label="Close" style="z-index: 1070;"></button>
                </div>
                <div class="modal-body text-center p-0">
                    <img id="modalPreviewImage" src="" alt="Preview Document" class="img-fluid rounded shadow-lg" style="max-height: 85vh; border: 4px solid white; display: inline-block;">
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 Bundle JS (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function openImage(imageUrl) {
            var modalImg = document.getElementById('modalPreviewImage');
            if (modalImg) {
                modalImg.src = imageUrl;
            }
            var modalEl = document.getElementById('imagePreviewModal');
            if (modalEl) {
                var myModal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
                myModal.show();
            }
        }
    </script>
</body>
</html>
