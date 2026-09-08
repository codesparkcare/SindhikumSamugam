</div> <!-- End of Wrapper -->

    <!-- Core Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('collapsed');
            });
            
            // Auto hide sidebar on small screens
            if ($(window).width() <= 768) {
                $('#sidebar').addClass('collapsed');
            }
            
            $(window).resize(function() {
                if ($(window).width() <= 768) {
                    $('#sidebar').addClass('collapsed');
                } else {
                    $('#sidebar').removeClass('collapsed');
                }
            });
        });
    </script>
    <!-- Custom Project Theme Notification Modal -->
    <style>
    @keyframes appModalPopIn {
        0% { opacity: 0; transform: scale(0.88) translateY(20px); }
        100% { opacity: 1; transform: scale(1) translateY(0); }
    }
    </style>

    <div id="appNotificationModal" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(15, 23, 42, 0.75); backdrop-filter: blur(8px); display: none; align-items: center; justify-content: center; z-index: 99999; padding: 1.25rem;">
        <div style="background: #ffffff; border-radius: 24px; max-width: 460px; width: 100%; padding: 2.25rem 2rem; box-shadow: 0 25px 50px -12px rgba(15, 23, 42, 0.35); text-align: center; border: 1px solid #e2e8f0; position: relative; animation: appModalPopIn 0.3s cubic-bezier(0.16, 1, 0.3, 1);">
            <div id="appModalIconBg" style="width: 64px; height: 64px; border-radius: 50%; background: rgba(5, 150, 105, 0.12); color: #059669; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.25rem auto; font-size: 1.8rem; box-shadow: 0 10px 20px rgba(5, 150, 105, 0.15);">
                <span id="appModalIcon">✓</span>
            </div>
            <h3 id="appModalTitle" style="font-size: 1.45rem; font-weight: 800; color: #0f172a; margin-bottom: 0.65rem; line-height: 1.3;">Notification</h3>
            <div id="appModalMessage" style="font-size: 1rem; color: #475569; line-height: 1.65; margin-bottom: 1.75rem; word-break: break-word;"></div>
            <button type="button" id="appModalCloseBtn" onclick="closeAppNotificationModal()" style="width: 100%; padding: 0.85rem 1.5rem; background: linear-gradient(135deg, #059669, #047857); color: #ffffff; border: none; border-radius: 12px; font-weight: 700; font-size: 1rem; cursor: pointer; box-shadow: 0 10px 20px rgba(5, 150, 105, 0.3); transition: all 0.2s ease;">
                OK, Understood
            </button>
        </div>
    </div>

    <!-- Custom Project Theme Confirmation Modal -->
    <div id="appConfirmModal" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(15, 23, 42, 0.75); backdrop-filter: blur(8px); display: none; align-items: center; justify-content: center; z-index: 999999; padding: 1.25rem;">
        <div style="background: #ffffff; border-radius: 24px; max-width: 450px; width: 100%; padding: 2.25rem 2rem; box-shadow: 0 25px 50px -12px rgba(15, 23, 42, 0.35); text-align: center; border: 1px solid #e2e8f0; position: relative; animation: appModalPopIn 0.3s cubic-bezier(0.16, 1, 0.3, 1);">
            <div style="width: 64px; height: 64px; border-radius: 50%; background: rgba(225, 29, 72, 0.12); color: #e11d48; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.25rem auto; font-size: 1.8rem; box-shadow: 0 10px 20px rgba(225, 29, 72, 0.15);">
                ⚠️
            </div>
            <h3 id="appConfirmTitle" style="font-size: 1.45rem; font-weight: 800; color: #0f172a; margin-bottom: 0.65rem; line-height: 1.3;">Confirm Action</h3>
            <p id="appConfirmMessage" style="font-size: 1rem; color: #475569; line-height: 1.65; margin-bottom: 1.75rem; word-break: break-word;">Are you sure you want to proceed?</p>
            <div style="display: flex; gap: 0.85rem; justify-content: center;">
                <button type="button" onclick="closeAppConfirmModal(false)" style="flex: 1; padding: 0.85rem 1.25rem; background: #f1f5f9; color: #475569; border: 1px solid #cbd5e1; border-radius: 12px; font-weight: 700; font-size: 0.95rem; cursor: pointer; transition: all 0.2s ease;">
                    Cancel
                </button>
                <button type="button" onclick="closeAppConfirmModal(true)" style="flex: 1; padding: 0.85rem 1.25rem; background: linear-gradient(135deg, #e11d48, #be123c); color: #ffffff; border: none; border-radius: 12px; font-weight: 700; font-size: 0.95rem; cursor: pointer; box-shadow: 0 10px 20px rgba(225, 29, 72, 0.3); transition: all 0.2s ease;">
                    Yes, Proceed
                </button>
            </div>
        </div>
    </div>

    <script>
    (function () {
        let modalCallback = null;
        let confirmTargetUrl = null;
        let confirmCallback = null;

        window.showAppNotification = function (message, title, type, callback) {
            const modal = document.getElementById('appNotificationModal');
            const iconBg = document.getElementById('appModalIconBg');
            const iconSpan = document.getElementById('appModalIcon');
            const titleEl = document.getElementById('appModalTitle');
            const msgEl = document.getElementById('appModalMessage');
            const closeBtn = document.getElementById('appModalCloseBtn');

            if (!modal) {
                if (callback) callback();
                return;
            }

            modalCallback = callback || null;
            msgEl.innerHTML = message;

            if (!title) {
                if (type === 'error') title = 'Notice';
                else if (type === 'info') title = 'Information';
                else title = 'Notification';
            }
            titleEl.textContent = title;

            if (type === 'error') {
                iconBg.style.background = 'rgba(225, 29, 72, 0.12)';
                iconBg.style.color = '#e11d48';
                iconBg.style.boxShadow = '0 10px 20px rgba(225, 29, 72, 0.15)';
                iconSpan.textContent = '✕';
                closeBtn.style.background = 'linear-gradient(135deg, #e11d48, #be123c)';
                closeBtn.style.boxShadow = '0 10px 20px rgba(225, 29, 72, 0.3)';
            } else if (type === 'info') {
                iconBg.style.background = 'rgba(2, 132, 199, 0.12)';
                iconBg.style.color = '#0284c7';
                iconBg.style.boxShadow = '0 10px 20px rgba(2, 132, 199, 0.15)';
                iconSpan.textContent = 'ℹ';
                closeBtn.style.background = 'linear-gradient(135deg, #0284c7, #0369a1)';
                closeBtn.style.boxShadow = '0 10px 20px rgba(2, 132, 199, 0.3)';
            } else {
                iconBg.style.background = 'rgba(5, 150, 105, 0.12)';
                iconBg.style.color = '#059669';
                iconBg.style.boxShadow = '0 10px 20px rgba(5, 150, 105, 0.15)';
                iconSpan.textContent = '✓';
                closeBtn.style.background = 'linear-gradient(135deg, #059669, #047857)';
                closeBtn.style.boxShadow = '0 10px 20px rgba(5, 150, 105, 0.3)';
            }

            modal.style.display = 'flex';
        };

        window.closeAppNotificationModal = function () {
            const modal = document.getElementById('appNotificationModal');
            if (modal) modal.style.display = 'none';
            if (modalCallback && typeof modalCallback === 'function') {
                const cb = modalCallback;
                modalCallback = null;
                cb();
            }
        };

        window.showAppConfirm = function (message, title, onConfirmUrlOrCb) {
            const modal = document.getElementById('appConfirmModal');
            const msgEl = document.getElementById('appConfirmMessage');
            const titleEl = document.getElementById('appConfirmTitle');

            if (!modal) {
                if (typeof onConfirmUrlOrCb === 'string') window.location.href = onConfirmUrlOrCb;
                else if (typeof onConfirmUrlOrCb === 'function') onConfirmUrlOrCb();
                return;
            }

            if (typeof onConfirmUrlOrCb === 'string') {
                confirmTargetUrl = onConfirmUrlOrCb;
                confirmCallback = null;
            } else if (typeof onConfirmUrlOrCb === 'function') {
                confirmCallback = onConfirmUrlOrCb;
                confirmTargetUrl = null;
            }

            if (msgEl) msgEl.textContent = message || 'Are you sure you want to proceed?';
            if (titleEl) titleEl.textContent = title || 'Confirm Delete';

            modal.style.display = 'flex';
        };

        window.closeAppConfirmModal = function (confirmed) {
            const modal = document.getElementById('appConfirmModal');
            if (modal) modal.style.display = 'none';
            if (confirmed) {
                if (confirmTargetUrl) {
                    const url = confirmTargetUrl;
                    confirmTargetUrl = null;
                    window.location.href = url;
                } else if (confirmCallback) {
                    const cb = confirmCallback;
                    confirmCallback = null;
                    cb();
                }
            }
        };

        // Override browser native alert
        window.alert = function (msg) {
            window.showAppNotification(msg);
        };
    })();
    </script>
</body>
</html>
