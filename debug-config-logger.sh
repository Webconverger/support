tail -f /var/log/apache2/config/access.log |
stdbuf -o0  grep -v 404 |
stdbuf -o0  grep -v bootstrap |
stdbuf -o0   grep clients/install-config |
stdbuf -o0 awk '{print $4,$1,$7}' |
while read date IP request
do
	IFS=? read -r base args <<< "$request"
	base=$(basename $base)
	echo $(echo $date | tr -d '[') $IP $args >> /srv/www/support.webconverger.com/a/$base
done
