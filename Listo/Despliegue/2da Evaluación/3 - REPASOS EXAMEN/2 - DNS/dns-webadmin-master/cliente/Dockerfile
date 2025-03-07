FROM debian:12

RUN apt-get update && apt-get install -y \
    curl procps iproute2 dnsutils iputils-ping\
    && rm -rf /var/lib/apt/lists/*

CMD tail -f /dev/null