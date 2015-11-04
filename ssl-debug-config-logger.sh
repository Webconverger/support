tail -F /var/log/apache2/config-access-ssl.log |
stdbuf -o0  grep -v " 404" |
stdbuf -o0  grep -v bootstrap |
stdbuf -o0  grep clients/install-config
